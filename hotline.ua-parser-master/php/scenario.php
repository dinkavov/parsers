<?php
require_once 'db.php';
require_once 'helpers.php';
require_once 'libs/curl/curl.php';
require_once 'libs/phpquery/phpQuery/phpQuery.php';

$curl = new Curl;
$res = array('success'=>false, 'result'=>false);
$query = '';
$item = false;
$items = array();
$allowed = array();
$good = array();
$url = 'http://hotline.ua';

if(isset($_GET) && !empty($_GET['query']))
{

    // XSS cleaning $_GET array
    $get = cleaner($_GET);
    $query = trim($get['query']);

    $pieces = explode(' ', $query);
    if (count($pieces) > 1) $query = makeQuery($pieces);

    $response = $curl->get($url . '/sr/?q=' . $query);
    $doc = phpQuery::newDocument($response->body);
    $items = $doc->find('.product-item');

    if (empty($items))
    {
        $res['success'] = true;
    } else {

        // store data to db queries table
        $query_id = saveQuery($get['query']);

        // parse hotlina.ua markup
        $query = $items[0]->find('.item-price a.link')->attr('href');
        $response = $curl->get($url . $query);
        $doc = phpQuery::newDocument($response->body);
        $items = $doc->find('.offers-item');

        $res['success'] = true;

        if (!empty($items))
        {
            foreach ($items as $k => $item) {
                $pq = pq($item);
                $res['result'][$k]['price'] = $pq->find('.value')->text() . $pq->find('.penny')->text();
                $res['result'][$k]['shop'] = trim($pq->find('.shop-box .ellipsis')->text());
                $res['result'][$k]['img'] = $url . $pq->find('.busy')->attr('src');
                $res['result'][$k]['desc'] = trim($pq->find('.description-box')->text());

                $good['query_id'] = $query_id;
                $good['shop'] = $res['result'][$k]['shop'];
                $good['price'] = $res['result'][$k]['price'];

                // store data to db results table
                saveResult($good);
            }
        }

        phpQuery::unloadDocuments();
    }
}

echo json_encode($res);
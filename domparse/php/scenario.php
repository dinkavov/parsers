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
$url = 'http://cyprus-realty.testsite.co.ua/prodazha-nedvizhimosti-na-kipre/';


    if (!empty($items)) {

        foreach ($items as $item){
        $pq = pq($item);

        $result['result']['title'] = $pq->find('.value')->text();
        $result['result']['price'] = $pq->find('.value')->text() . $pq->find('.penny')->text();
        $result['result']['description'] = trim($pq->find('.description-box')->text());

        }

     phpQuery::unloadDocuments();
}

echo json_encode($res);

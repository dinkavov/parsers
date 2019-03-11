<?php ini_set('display_errors', 1)?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Parser</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <?php
        require_once 'phpquery/branches/dev/phpQuery/phpQuery.php';


        function print_arr($arr){
            echo '<pre>' . print_r($arr, true) . '</pre>';
        }

        $url = 'http://cyprus-realty.testsite.co.ua/prodazha-nedvizhimosti-na-kipre/';
        $file = file_get_contents($url);

        $doc = phpQuery::newDocument($file);

        $list = $doc->find('#products');
        echo $list;

        if($list) {

            foreach ($list as $item) {

                $item->find('.caption-container, .media-headering, .clippedtext');
                var_dump($item);die;
                echo $item;

            }
        }

//clippedtext, .main-price, .products-options
        ?>
    </div>
</body>
</html>

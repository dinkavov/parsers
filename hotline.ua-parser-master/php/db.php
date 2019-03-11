<?php

/**
 * @return PDO
 */
function connect () {
    $host = '127.0.0.1';
    $db   = 'search_db';
    $user = 'root';
    $pass = '';
    $charset = 'utf8';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    $pdo = new PDO($dsn, $user, $pass, $opt);
    return $pdo;
}

/**
 * @param $query
 * @return bool
 */
function saveQuery($query) {
    $pdo = connect();

    $stmt = $pdo->prepare("INSERT INTO queries (query) VALUES (:query)");
    $stmt->bindParam(':query', $query);
    $stmt->execute();

    $id = $pdo->lastInsertId();
    $pdo = null;

    return $id;
}

/**
 * @param $allowed
 * @param $results
 * @return bool
 */
function saveResult($results) {
    $pdo = connect();

    $stmt =  $pdo->prepare("INSERT INTO results (query_id, shop, price) VALUES (:query_id, :shop, :price)");
    $stmt->bindParam(':query_id', $results['query_id']);
    $stmt->bindParam(':shop', $results['shop']);
    $stmt->bindParam(':price', $results['price']);
    $stmt->execute($results);

    $id = $pdo->lastInsertId();
    $pdo = null;

    return $id;
}
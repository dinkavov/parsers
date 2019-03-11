<?php

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

function saveResult($results) {
    $pdo = connect();

    $stmt =  $pdo->prepare("INSERT INTO results (id, title, price, description) VALUES (:query_id, :shop, :price)");
    $stmt->bindParam(':id', $results['id']);
    $stmt->bindParam(':title', $results['title']);
    $stmt->bindParam(':price', $results['price']);
    $stmt->bindParam(':description', $results['description']);
    $stmt->execute($results);

    $id = $pdo->lastInsertId();
    $pdo = null;

    return $id;
}
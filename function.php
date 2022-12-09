<?php
// データベースに接続
function connectDB() {
    $param = 'mysql:dbname=webdb;host=localhost';
    try {
        $pdo = new PDO($param,'webusr','abccsd2');
        return $pdo;

    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}
?>
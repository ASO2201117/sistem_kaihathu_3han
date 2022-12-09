<?php
$dsn  = 'mysql:dbname=webdb;host=localhost;charset=utf8';
$user = 'webusr';
$pw   = 'abccsd2';
$driver_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,
];

//データベースに接続
$pdo = new PDO(
     $dsn,
     $user,
     $pw,
     $driver_options
);

// 画像データを取得
$sql = 'SELECT * FROM `image_data` WHERE `id` = :id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $_GET['id']);
$stmt->execute();

// 表示
header('Content-type:image/jpg');
echo $stmt->fetchAll()[0]['img'];
?>
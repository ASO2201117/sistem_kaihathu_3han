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

$sql = '
    INSERT INTO
        `image_data` (img, img_name, user_name)
    VALUES
        (:img, :img_name, :user_name)
';

// 画像データ
$img_data = file_get_contents($_FILES['image']['tmp_name']);

// DBに保存
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':img', $img_data);
$stmt->bindValue(':img_name', $_POST['img_name']);
$stmt->bindValue(':user_name', $_POST['your_name']);
$stmt->execute();
?>
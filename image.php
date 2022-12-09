<?php
require_once 'function.php';

$pdo = connectDB();

$sql = 'SELECT * FROM images WHERE image_id = :image_id LIMIT 1';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':image_id', (int)$_GET['id'], PDO::PARAM_INT);
$stmt->execute();
$images = $stmt->fetch();

header('Content-type: ' . $images['image_type']);
echo $images['image_content'];
exit();
?>
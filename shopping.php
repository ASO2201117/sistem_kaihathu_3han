<?php

    $name = (isset($_POST['name']))? htmlspecialchars($_POST['name'], ENT_QUOTES, 'utf-8') : '';
    $price = (isset($_POST['price']))? htmlspecialchars($_POST['price'], ENT_QUOTES, 'utf-8') : '';
    $count = (isset($_POST['count']))? htmlspecialchars($_POST['count'], ENT_QUOTES, 'utf-8') : '';
    
    session_start();

    //もし、sessionにproductsがあったら
    if(isset($_SESSION['products'])){  
        //$_SESSION['products']を$productsという変数にいれる
        $products = $_SESSION['products']; 
        //$proeuctsをforeachで回し、キー(商品名)と値（金額・個数）取得
        foreach($products as $key => $product){  
            //もし、キーとPOSTで受け取った商品名が一致したら、
            if($key == $name){ 
                //既に商品がカートに入っているので、個数を足し算する     
                $count = (int)$count + (int)$product['count'];
            }
        }
    }  
    //配列に入れるには、$name,$count,$priceの値が取得できていることが前提なのでif文で空のデータを排除する
    if($name!=''&&$count!=''&&$price!=''){
        $_SESSION['products'][$name]=[
            'count' => $count,
            'price' => $price
        ];
    }
    $products = isset($_SESSION['products'])? $_SESSION['products']:[];

?>
<?php
require_once('function.php');

$pdo = connectDB();

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    // 画像を取得
    $sql = 'SELECT * FROM images ORDER BY created_at ASC';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $images = $stmt->fetchAll();
} else {
    // 画像を保存
    if (!empty($_FILES['image']['name'])) {
        $name = $_FILES['image']['name'];
        $type = $_FILES['image']['type'];
        $content = file_get_contents($_FILES['image']['tmp_name']);
        $size = $_FILES['image']['size'];

        $sql = 'INSERT INTO images(image_name, image_type, image_content, image_size, created_at)
                VALUES (:image_name, :image_type, :image_content, :image_size, now())';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':image_name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':image_type', $type, PDO::PARAM_STR);
        $stmt->bindValue(':image_content', $content, PDO::PARAM_STR);
        $stmt->bindValue(':image_size', $size, PDO::PARAM_INT);
        $stmt->execute();
    }
    header('Location:cart2.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>主婦向け家電</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="ここにサイト説明を入れます">
<link rel="stylesheet" href="css/style.css">
<link rel="apple-touch-icon" href="favicon/apple-touch-icon-152x152-precomposed.png">
<link rel="icon" href="favicon/icon-512x512.png">
</head>

<body>

<header>
<h1 id="logo"><a href="index.html"><img src="images/kakako.png" alt="主婦"></a></h1>
</header>

<div id="container">

<nav id="header-menu">
    <ul>
        <li><a href="index.html">ホーム<i class="fa fa-home"></i></a></li>
        <li><a href="shopping.html">ユーザー<i class="fas fa-user"></i></a></li>
        <li><a href="event.html">お知らせ<i class="far fa-calendar-alt"></i></a></li>
        <li><a href="http://localhost/web/shuhu/cart.php">カート<i class="fas fa-shopping-cart"></i></a></li>
        </ul>
</nav>

<main>

<section>

<h2 class="flag">商品一覧<span>Shopping</span></h2>

<div class="list-container">

<div class="list-square blur">
<figure><a href="index.html">
<?php for ($i = 0; $i < 1; $i++): ?>
                <div class="carousel-item <?php if ($i == 0) echo 'active'; ?>">
                  <img src="image.php?id=<?= $images[$i]['image_id']; ?>">
                </div>
<?php endfor; ?>
        </a>
</figure>
<div class="text">
<h4>アイロン</h4>
<p>¥1000   アイロンです</p>
<form action="login_form.php" method="POST" class="item-form">
    <input type="hidden" name="name" value="アイロン">
    <input type="hidden" name="price" value="1000">
    <input type="number" value="1" name="count">
    <button type="submit"  class="btn-sm btn-blue">カートに入れる</button>
</form>
</div>
<span class="icon">おすすめ</span>
</div>
<div class="list-square blur">
<figure><a href="index.html">
<?php for ($i = 1; $i < 2; $i++): ?>
                <div class="carousel-item <?php if ($i == 0) echo 'active'; ?>">
                  <img src="image.php?id=<?= $images[$i]['image_id']; ?>">
                </div>
<?php endfor; ?>
        </a>
</figure>
<div class="text">
<h4>洗濯機</h4>
<p>¥2000   洗濯機です</p>
<form action="login_form.php" method="POST" class="item-form">
    <input type="hidden" name="name" value="洗濯機">
    <input type="hidden" name="price" value="2000">
    <input type="number" value="1" name="count">
    <button type="submit"  class="btn-sm btn-blue">カートに入れる</button>
</form>
</div>
</div>

<div class="list-square blur">
<figure><a href="index.html">
<?php for ($i = 2; $i < 3; $i++): ?>
                <div class="carousel-item <?php if ($i == 0) echo 'active'; ?>">
                  <img src="image.php?id=<?= $images[$i]['image_id']; ?>">
                </div>
<?php endfor; ?>
        </a>
</figure>
<div class="text">
<h4>電子レンジ</h4>
<p>¥2000   電子レンジです</p>
<form action="login_form.php" method="POST" class="item-form">
    <input type="hidden" name="name" value="電子レンジ">
    <input type="hidden" name="price" value="2000">
    <input type="number" value="1" name="count">
    <button type="submit"  class="btn-sm btn-blue">カートに入れる</button>
</form>
</div>
</div>

<div class="list-square blur">
<figure><a href="index.html">
<?php for ($i = 3; $i < 4; $i++): ?>
                <div class="carousel-item <?php if ($i == 0) echo 'active'; ?>">
                  <img src="image.php?id=<?= $images[$i]['image_id']; ?>">
                </div>
<?php endfor; ?>
        </a>
</figure>
<div class="text">
<h4>電気ポット</h4>
<p>¥1500   電気ポットです</p>
<form action="login_form.php" method="POST" class="item-form">
    <input type="hidden" name="name" value="電気ポット">
    <input type="hidden" name="price" value="1500">
    <input type="number" value="1" name="count">
    <button type="submit"  class="btn-sm btn-blue">カートに入れる</button>
</form>
</div>
</div>

<div class="list-square blur">
<figure><a href="index.html">
<?php for ($i = 4; $i < 5; $i++): ?>
                <div class="carousel-item <?php if ($i == 0) echo 'active'; ?>">
                  <img src="image.php?id=<?= $images[$i]['image_id']; ?>">
                </div>
<?php endfor; ?>
        </a>
</figure>
<div class="text">
<h4>炊飯器</h4>
<p>¥3000   炊飯器です</p>
<form action="login_form.php" method="POST" class="item-form">
    <input type="hidden" name="name" value="炊飯器">
    <input type="hidden" name="price" value="3000">
    <input type="number" value="1" name="count">
    <button type="submit"  class="btn-sm btn-blue">カートに入れる</button>
</form>
</div>
</div>

<div class="list-square blur">
<figure><a href="index.html">
<?php for ($i = 5; $i < 6; $i++): ?>
                <div class="carousel-item <?php if ($i == 0) echo 'active'; ?>">
                  <img src="image.php?id=<?= $images[$i]['image_id']; ?>">
                </div>
<?php endfor; ?>
        </a>
</figure>
<div class="text">
<h4>掃除機</h4>
<p>¥5000   掃除機です</p>
<form action="login_form.php" method="POST" class="item-form">
    <input type="hidden" name="name" value="掃除機">
    <input type="hidden" name="price" value="5000">
    <input type="number" value="1" name="count">
    <button type="submit"  class="btn-sm btn-blue">カートに入れる</button>
</form>
</div>
</div>

<div class="list-square blur">
<figure><a href="index.html">
<?php for ($i = 6; $i < 7; $i++): ?>
                <div class="carousel-item <?php if ($i == 0) echo 'active'; ?>">
                  <img src="image.php?id=<?= $images[$i]['image_id']; ?>">
                </div>
<?php endfor; ?>
        </a>
</figure>
<div class="text">
<h4>ミキサー</h4>
<p>¥2000   ミキサーです</p>
<form action="login_form.php" method="POST" class="item-form">
    <input type="hidden" name="name" value="ミキサー">
    <input type="hidden" name="price" value="2000">
    <input type="number" value="1" name="count">
    <button type="submit"  class="btn-sm btn-blue">カートに入れる</button>
</form>
</div>
</div>

<div class="list-square blur">
<figure><a href="index.html">
<?php for ($i = 7; $i < 8; $i++): ?>
                <div class="carousel-item <?php if ($i == 0) echo 'active'; ?>">
                  <img src="image.php?id=<?= $images[$i]['image_id']; ?>">
                </div>
<?php endfor; ?>
        </a>
</figure>
<div class="text">
<h4>圧力鍋</h4>
<p>¥4000   圧力鍋です</p>
<form action="login_form.php" method="POST" class="item-form">
    <input type="hidden" name="name" value="圧力鍋">
    <input type="hidden" name="price" value="4000">
    <input type="number" value="1" name="count">
    <button type="submit"  class="btn-sm btn-blue">カートに入れる</button>
</form>
</div>
</div>

<div class="list-square blur">
<figure><a href="index.html">
<?php for ($i = 8; $i < 9; $i++): ?>
                <div class="carousel-item <?php if ($i == 0) echo 'active'; ?>">
                  <img src="image.php?id=<?= $images[$i]['image_id']; ?>">
                </div>
<?php endfor; ?>
        </a>
</figure>
<div class="text">
<h4>コーヒーメーカー</h4>
<p>¥3000   コーヒーメーカーです</p>
<form action="login_form.php" method="POST" class="item-form">
    <input type="hidden" name="name" value="コーヒーメーカー">
    <input type="hidden" name="price" value="3000">
    <input type="number" value="1" name="count">
    <button type="submit"  class="btn-sm btn-blue">カートに入れる</button>
</form>
</div>
</div>


</div>
<!--/.list-container-->

</section>

</main>

<div id="footermenu">
<ul>
<li class="title">メニュー</li>
<li><a href="index.html">ホーム</a></li>
<li><a href="shopping.php">商品</a></li>
<li><a href="login_form.php">ユーザー</a></li>
<li><a href="event.html">イベント</a></li>
<li><a href="cart.php">カート</a></li>
<li><a href="login_form.php">ログイン</a></li>
<li><a href="access.html">お問い合わせ</a></li>
</ul>
</div>
<!--/#footermenu-->

<footer>
    <small>Copyright&copy; <a href="index.html">主婦向け家電</a> All Rights Reserved.</small>
    <span class="pr"><a href="https://template-party.com/" target="_blank">《Web Design:Template-Party》</a></span>
</footer>

<!--開閉ブロック-->
<div id="menubar">

<nav>
<ul>
<li><a href="index.html">ホーム</a></li>
<li><a href="shopping.php">商品</a></li>
<li><a href="login_form.php">ユーザー</a></li>
<li><a href="event.html">イベント</a></li>
<li><a href="cart.php">カート</a></li>
<li><a href="login_form.php">ログイン</a></li>
</ul>
</nav>

<p class="btn"><a href="contact.html">お問い合わせ</a></p>


<!--/.sh-->

</div>
<!--/#menubar-->

<!--開閉ボタン（ハンバーガーアイコン）-->
<div id="menubar_hdr">
<div>
<span></span><span></span><span></span>
</div>
<p>MENU</p>
</div>

</div>
<!--/#container-->

<!--jQueryの読み込み-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!--パララックス（inview）-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/protonet-jquery.inview/1.1.2/jquery.inview.min.js"></script>
<script src="js/jquery.inview_set.js"></script>
<script>
    function click() {
      alert("ボタンがクリックされました！");
    }
</script>
<!--このテンプレート専用のスクリプト-->
<script src="js/main.js"></script>

<!--ページの上部へ戻るボタン-->
<div class="pagetop"><a href="#"><i class="fas fa-angle-double-up"></i></a></div>

</body>
</html>

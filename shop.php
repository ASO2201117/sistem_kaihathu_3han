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
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>主婦向け家電</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="ここにサイト説明を入れます">
<link rel="stylesheet" href="css/styles.css">

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
        <li><a href="access.html">カート<i class="fas fa-shopping-cart"></i></a></li>
        </ul>
</nav>

<main>
    <section>
    <div class="list-container">
            <div class="wrapper last-wrapper">
                <div class="containner">
                <h2 class="flag">商品一覧<span>Shopping</span></h2>
                    <div class="itemnlist">
                        <ul>
                            <li>
                                <img src="images/iron.jpg" >
                                <div class="item-body">
                                    <h5>アイロン</h5>
                                    <p>¥1000</p>
                                    <form action="shop.php" method="POST" class="item-form">
                                        <input type="hidden" name="name" value="アイロン">
                                        <input type="hidden" name="price" value="1000">
                                        <input type="text" value="1" name="count">
                                        <button type="submit"  class="btn-sm btn-blue">カートに入れる</button>
                                    </form>
                                </div><!-- end item-body--> 
                            </li>
                            <li>
                                <img src="images/shohin1.jpg" >
                                <div class="item-body">
                                    <h5>洗濯機</h5>
                                    <p>¥2000</p>
                                    <form action="shop.php" method="POST" class="item-form">
                                        <input type="hidden" name="name" value="洗濯機">
                                        <input type="hidden" name="price" value="2000">
                                        <input type="text" value="1" name="count">
                                        <button type="submit"  class="btn-sm btn-blue">カートに入れる</button>
                                    </form>
                                </div><!-- end item-body--> 
                            </li>
                            <li>
                                <img src="images/potto.jpg" >
                                <div class="item-body">
                                    <h5>電子ポット</h5>
                                    <p>¥1500</p>
                                    <form action="shop.php" method="POST" class="item-form">
                                        <input type="hidden" name="name" value="電子ポット">
                                        <input type="hidden" name="price" value="200">
                                        <input type="text" value="1" name="count">
                                        <button type="submit" class="btn-sm btn-blue" onClick="click()">カートに入れる</button>
                                    </form>
                                </div><!-- end item-body--> 
                            </li>
                            <li>
                                <img src="images/renzi.jpg" >
                                <div class="item-body">
                                    <h5>電子レンジ</h5>
                                    <p>¥1500</p>
                                    <form action="shop.php" method="POST" class="item-form">
                                        <input type="hidden" name="name" value="電子レンジ">
                                        <input type="hidden" name="price" value="1500">
                                        <input type="text" value="1" name="count">
                                        <button type="submit" class="btn-sm btn-blue">カートに入れる</button>
                                    </form>    
                                </div><!-- end item-body--> 
                            </li>
                        </ul>
                    </div><!-- end itemlist -->
                </div>
            </div>
</div>
        </section>
        </main>
<div id="footermenu">
<ul>
<li class="title">メニュー</li>
<li><a href="index.html">ホーム</a></li>
<li><a href="company.html">運営会社</a></li>
<li><a href="info.html">施設のご案内</a></li>
<li><a href="shopping.html">お買い物</a></li>
<li><a href="event.html">イベント</a></li>
<li><a href="access.html">アクセス</a></li>
</ul>
<ul>
<li class="title">メニュー見出し</li>
<li><a href="#">サンプルメニューサンプルメニュー</a></li>
<li><a href="#">サンプルメニュー</a></li>
<li><a href="#">サンプルメニュー</a></li>
<li><a href="#">サンプルメニュー</a></li>
</ul>
<ul>
<li class="title">メニュー見出し</li>
<li><a href="#">サンプルメニューサンプルメニュー</a></li>
<li><a href="#">サンプルメニュー</a></li>
<li><a href="#">サンプルメニュー</a></li>
<li><a href="#">サンプルメニュー</a></li>
</ul>
<ul>
<li class="title">メニュー見出し</li>
<li><a href="#">サンプルメニューサンプルメニュー</a></li>
<li><a href="#">サンプルメニュー</a></li>
<li><a href="#">サンプルメニュー</a></li>
<li><a href="#">サンプルメニュー</a></li>
</ul>
</div>
<!--/#footermenu-->

<footer>
<small>Copyright&copy; <a href="index.html">道の駅</a> All Rights Reserved.</small>
<span class="pr"><a href="https://template-party.com/" target="_blank">《Web Design:Template-Party》</a></span>
</footer>

<!--開閉ブロック-->
<div id="menubar">

<nav>
<ul>
<li><a href="index.html">ホーム</a></li>
<li><a href="info.html">施設のご案内</a></li>
<li><a href="shopping.html">お買い物</a></li>
<li><a href="event.html">イベント</a></li>
<li><a href="access.html">アクセス</a></li>
</ul>
</nav>

<p class="btn"><a href="contact.html">お問い合わせ</a></p>

<div class="sh">
<p>※900px未満のメニュー開閉時にのみ表示させたい情報があればここ（shボックスの中）に入れて下さい。<br>
サンプルテキスト。サンプルテキスト。<br>
サンプルテキスト。サンプルテキスト。<br>
サンプルテキスト。サンプルテキスト。</p>
</div>
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

<!--このテンプレート専用のスクリプト-->
<script src="js/main.js"></script>
<script src="js/click.js"></script>



<!--ページの上部へ戻るボタン-->
<div class="pagetop"><a href="#"><i class="fas fa-angle-double-up"></i></a></div>

</body>
</html>
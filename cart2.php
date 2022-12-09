<?php

    $delete_name = (isset($_POST['delete_name']))? htmlspecialchars($_POST['delete_name'], ENT_QUOTES, 'utf-8') : '';

    session_start();

    if($delete_name != '') unset($_SESSION['products'][$delete_name]);
    
    //合計の初期値は0
    $total = 0; 

    $products = isset($_SESSION['products'])? $_SESSION['products']:[];

    foreach($products as $name => $product){
        //各商品の小計を取得
        $subtotal = (int)$product['price']*(int)$product['count'];
        //各商品の小計を$totalに足す
        $total += $subtotal;
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
<STYLE type="text/css">
<!--
.btn2 {
  cursor: pointer;
  text-decoration: none;border: none;
	display: block;
	font-size: 1em;
	box-shadow: 2px 2px 5px rgba(0,0,0,0.2);	/*ボックスの影。右へ、下へ、ぼかし幅の順。0,0,0は黒の事で0.2は色が20%出た状態。*/
	background: #e47a8c;	/*背景色*/
	letter-spacing: 0.1em;	/*文字間隔を少し広くする指定*/
	color: #fff;			/*文字色*/
	transition: 0.3s;		/*hoverまでにかける時間。0.3秒。*/
	padding: 0.7em 1em;		/*上下、左右へのボタン内の余白*/
	margin-top: 2em;
    margin-bottom:30px;
}
.text{
    margin-top:30px;
}
.cart{
    font-size:40px;
    color:black;
}
.cart-btn {
        text-align: center;
        cursor: pointer;
        margin-bottom:30px;
    }
#te{
}
-->
</STYLE>
</head>

<body>

<header>
<h1 id="logo"><a href="index2.html"><img src="images/kakako.png" alt="主婦"></a></h1>
</header>

<div id="container">

<nav id="header-menu">
    <ul>
        <li><a href="index2.html">ホーム<i class="fa fa-home"></i></a></li>
        <li><a href="http://localhost/web/shuhu/shopping2.php"">商品<i class="fas fa-image"></i></a></li>
        <li><a href="customer.php">ユーザー<i class="fas fa-user"></i></a></li>
        <li><a href="event2.html">お知らせ<i class="far fa-calendar-alt"></i></a></li>
        </ul>
</nav>

<main>
            <div class="wrapper last-wrapper" align="center">
                <div class="container">
                <div class="wrapper-title">
                        <h3>MY CART</h3>
                        <p><i class="fas fa-shopping-cart cart"></i></p>
                    </div>
                    <div class="cartlist">
                        <table class="cart-table">
                            <thead>    
                            <tr>
                                    <th>商品名</th>
                                    <th>価格</th>
                                    <th>個数</th>
                                    <th>小計</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($products as $name => $product): ?>
                                <tr>
                                    <td label="商品名："><?php echo $name; ?></td>
                                    <td label="価格：" class="text-right">¥<?php echo $product['price']; ?></td>
                                    <td label="個数：" class="text-right"><?php echo $product['count']; ?></td>
                                    <td label="小計：" class="text-right">¥<?php echo $product['price']*$product['count']; ?></td>
                                    <td>
                                        <form action="cart2.php" method="post">
                                            <input type="hidden" name="delete_name" value="<?php echo $name; ?>">
                                            <button type="submit" class="btn-sm btn-blue">削除</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <tr class="total">
                                    <th colspan="3">合計</th>
                                    <td colspan="2">¥<?php echo $total; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="cart-btn">
                            <button type="button"  class="btn-sm btn-blue" onclick="location.href='http://localhost/web/shuhu/kounyu.php'">購入</button>
                            <button type="buttpn"  class="btn-sm btn-blue" onclick="location.href='http://localhost/web/shuhu/shopping2.php'">お買い物を続ける</button>
                        </div>
                    </div>
                </div>
            </div>
            </main>
            <div id="footermenu">
    <ul>
    <li class="title">メニュー</li>
    <li><a href="index2.html">ホーム</a></li>
    <li><a href="shopping2.php">商品</a></li>
    <li><a href="customer.php">ユーザー</a></li>
    <li><a href="event2.html">イベント</a></li>
    <li><a href="cart2.php">カート</a></li>
    <li><a href="index.html">ログアウト</a></li>
    <li><a href="contact2.html">お問い合わせ</a></li>
    </ul>
    </div>
<!--/#footermenu-->

<footer>
<small>Copyright&copy; <a href="index2.html">主婦向け家電</a> All Rights Reserved.</small>
<span class="pr"><a href="https://template-party.com/" target="_blank">《Web Design:Template-Party》</a></span>
</footer>

<!--開閉ブロック-->
<div id="menubar">

<nav>
<ul>
<li><a href="index2.html">ホーム</a></li>
<li><a href="shopping2.php">商品</a></li>
<li><a href="customer.php">ユーザー</a></li>
<li><a href="event2.html">イベント</a></li>
<li><a href="cart2.php">カート</a></li>
<li><a href="index.html">ログアウト</a></li>
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

<!--このテンプレート専用のスクリプト-->
<script src="js/main.js"></script>

<!--ページの上部へ戻るボタン-->
<div class="pagetop"><a href="#"><i class="fas fa-angle-double-up"></i></a></div>

</body>
</html>
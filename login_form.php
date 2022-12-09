<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>主婦向け家電</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="ここにサイト説明を入れます">
<link rel="stylesheet" href="css/style.css">
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
#te{
    margin-top:30px;
    margin-bottom:30px;
}
-->
</STYLE>
</head>
<body>

<header>
<h1 id="logo"><a href="index.html"><img src="images/kakako.png" alt="主婦"></a></h1>
</header>

<div id="container">


<main>
<?php
session_start();
if(isset($_SESSION["mail"]) == true &&
   isset($_SESSION["password"]) == true){
    header('Location:login.php');    
}
?>
<form action="login.php" method="post">
    <div align="center">
    <div id="te"><h1>ログイン</h1></div>
    <div id="te">メールアドレス<br><input type="text" autocomplete="off" style="width: 300px; height: 30px;" name="u"><br></div>
    <div id="te">パスワード<br><input type="password" autocomplete="off" style="width: 300px; height: 30px;" name="ps"><br></div>
    <input class="btn2" type="submit" value="ログイン">
</form>
</main>
<div align="center">
<div id="te"><a href="http://localhost/web/shuhu/access.php">新規会員登録</a></div>
</div>
<div id="footermenu">
<ul>
<li class="title">メニュー</li>
<li><a href="index.html">ホーム</a></li>
<li><a href="shopping.php">商品</a></li>
<li><a href="login_form.php">ユーザー</a></li>
<li><a href="event.html">イベント</a></li>
<li><a href="cart.php">カート</a></li>
<li><a href="login_form.php">ログイン</a></li>
<li><a href="contact.html">お問い合わせ</a></li>
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

<!--スライドショー（vegas）-->

<!--パララックス（inview）-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/protonet-jquery.inview/1.1.2/jquery.inview.min.js"></script>
<script src="js/jquery.inview_set.js"></script>

<!--このテンプレート専用のスクリプト-->
<script src="js/main.js"></script>

<!--ページの上部へ戻るボタン-->
<div class="pagetop"><a href="#"><i class="fas fa-angle-double-up"></i></a></div>
</body>
</html>

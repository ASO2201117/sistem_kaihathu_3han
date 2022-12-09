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
    margin-top:80px;
    margin-bottom:90px;
    text-align:center;
    font-size:30px;
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
$pdo = new PDO('mysql:host=localhost;dbname=webdb;charset=utf8','webusr','abccsd2');
    $sql_select = "SELECT img_name,img FROM image_data WHERE id = ?";
    $result1=$pdo->prepare($sql_select);
    //パラメータをセット
    $id=1;
    $result1->bindparam(1,$id,PDO::PARAM_INT);
    $result1->execute();
    $row = $result1 -> fetch(PDO::FETCH_ASSOC);
    //取得した画像バイナリデータをbase64で変換。
    $img = base64_encode($row['img']);
 ?>
    <!-- エンコードした情報をimgタグに表示 -->
    <img src="data:<?php echo $row['img_name'] ?>;base64,<?php echo $img; ?>"><br>
  </main>
<div align="center">
<div id="te"><a href="index2.html">トップページへ戻る</a></a></div>
</div>
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

<!--ページの上部へ戻るボタン-->
<div class="pagetop"><a href="#"><i class="fas fa-angle-double-up"></i></a></div>
</body>
</html>
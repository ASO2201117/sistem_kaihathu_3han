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
.btn2{
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

.te{
    text-align:center;
}
.error{
	color:red;
}
-->
</STYLE>
</head>
<header>
<h1 id="logo"><a href="index.html"><img src="images/kakako.png" alt="主婦"></a></h1>
</header>

<div id="container">
<main>
<?php
session_start();
if(isset($_SESSION["mail"]) == true &&
   isset($_SESSION["password"]) == true){
    header('Location:index.html');    
}
?>
</main>
<body>
<form action="access2.php" method="post">
<div align="center">
    <div id="app">
        <div class="form-area___name">
            <p>ユーザー名</p>
            <input
            type="text"
            name="mei"
			autocomplete="off"
            v-model="name"
            />
            <p class="error"
            v-if="isInValidName"
            >ユーザー名は10文字以内で入力してください</p>
            </div>
            <div class="form-area__mailaddress">
                <p>メールアドレス</p>
                <input
                type="text"
                name="address"
				autocomplete="off"
                v-model="mailaddress"
                />
                <p v-if="isInValidMailaddress"
                class="error"
                >メールアドレスを正しく入力してください</p>
                </div>
                <div class="form-area__password">
                <p>パスワード</p>
                <input
                type="password"
                name="pass"
				autocomplete="off"
                v-model="password"
                />
                <p v-if="isInValidPassword"
                class="error"
                >パスワードは5文字以上で入力してください</p>
                </div>
                <div class="form-area__address">
                <p>住所</p>
                <input type="address"
                name="zyusyo"
				autocomplete="off"
                v-model="address"
                />
                </div>
                <div class="form-area__tel">
                <p>電話番号</p>
                <input
                type="tel"
                name="bangou"
				autocomplete="off"
                v-model="tel"
                />
                <p v-if="isInValidTel"
                class="error"
                >電話番号を正しく入力してください</p>
                </div>
				<div aligin="center">
				<input type="submit" value="新規登録" class="btn2">
				</div>
            </div>
		</div>
        </form>
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

            <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
			<script src="js/script.js"></script>
    </body>
</html>

<?php
session_start();

include("funcs.php");
loginCheck();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOP Plus</title>
    <link rel="stylesheet" href="./css/shop.css">
</head>
<body>
	<div class="main">
		<div class="head">
			<div class="home">
				<a href="./top-page.php"><img src="./img/家の無料アイコンのコピー.png"></a>
				<p>SHOP　Plus</p>
			</div>
		</div>
		<form enctype="multipart/form-data" action="shop_slide.php" method="POST">
			<div class="commons">
				<div id="common">
					<label>会社名 / 店舗名 （必須項目）</label>
					<input class="input_form" type="text" name="name" placeholder="例：：株式会社Eat Shop" required>
				</div>

				<div id="common">
					<label>購入先 のURL （必須項目）</label>
					<input class="input_form" type="url" name="url" placeholder="例：https://www.〜" required>
				</div>

				<div id="common">
					<label>商品名 （必須項目）</label>
					<input class="input_form" type="text" name="common_name" placeholder="例：○○県産お米、さくほろクッキー" required>
				</div>

				<div id="common">
					<label>商品内容</label>
					<textarea class="input_form" placeholder="例：内容量や商品の食材名" name="common"></textarea>
				</div>

				<div id="common">
					<label>おすすめポイント</label>
					<textarea class="input_form" placeholder="例：サクサクで美味しい、もっちりお米など" name="point"></textarea>
				</div>

				<div  id="common">
					<!-- サイズ指定 -->
					<input type="hidden" name="MAX_FILE_SIZE" value="1048576">
					<!-- 画像だけ選択するaccept -->
					<input value="画像を選択（必須項目）" class=file type="file" name="img" accept="image/*" required>
					<input type="submit" name="送信" id="">
				</div>
			</div>
		</form>
	</div>
</body>
</html>

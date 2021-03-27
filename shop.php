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
<div class="home">
        <a href="./top-page.php"><img src="./img/家の無料アイコンのコピー.png"></a>
</div>
<form enctype="multipart/form-data" action="shop_slide.php" method="POST">
	<div class="inputs">
		<p>会社名 / 店舗名 （必須項目）</p>
		<input class="input_form" type="text" name="name" placeholder="会社名 / 店舗名" required>
	</div>

	<div class="inputs">
		<p>購入先 のURL （必須項目）</p>
		<input class="input_form" type="url" name="url" placeholder="URL" required>
	</div>

	<div class="inputs">
		<p>商品名 （必須項目）</p>
		<input class="input_form" type="text" name="common_name" placeholder="商品名" required>
	</div>

	<div class="inputs">
		<p>商品内容</p>
		<textarea class="input_form" placeholder="商品内容" name="common"></textarea>
	</div>

    <div class="inputs">
		<p>おすすめポイント</p>
		<textarea class="input_form" placeholder="おすすめポイント" name="point"></textarea>
	</div>

    <div class="file-up">
        <!-- サイズ指定 -->
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
        <!-- 画像だけ選択するaccept -->
        <input value="画像を選択（必須項目）" class=file type="file" name="img" accept="image/*" required>
		<input type="submit" name="送信" id="">
    </div>

</form>
</body>
</html>
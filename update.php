<?php

session_start();

include("funcs.php");
loginCheck();

require_once "./dbc.php";
$id = $_POST["id"];
$getFile = getFile($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECIPE CHAT</title>
    <link rel="stylesheet" href="css/chat.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <header class="leftNavigation">
        <a href="./top-page.php"><img src="./img/家の無料アイコン.png">Home</a>
        <h1>RECIPE CHAT</h1>
        <!-- 複数のものを送る -->
        <form enctype="multipart/form-data" action="update_ok.php" method="POST">
            <?php foreach($getFile as $get):?>
                <div>
                    <textarea name="name" class="name" placeholder="料理名" cols="40" rows="2"><?php echo "{$get['name']}"; ?></textarea>
                    <textarea name="zairyo" class="text" placeholder="材料" cols="40" rows="20"><?php echo "{$get['zairyo']}"; ?></textarea>
                    <textarea name="recipe" class="text" placeholder="レシピ" cols="40" rows="20"><?php echo "{$get['recipe']}"; ?></textarea>
                </div>
                <div class="file-up">
                    <!-- valueは1MBのサイズの数字 -->
                    <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                    <!-- 画像だけ選択するaccept -->
                    <?php echo "{$get['file_path']}"; ?>
                    <input class=file type="file" name="img" accept="image/*">
                </div>
                <div class="submit">
                    <input type="submit" value="変更" class="button">
                        <input type="hidden" name="id" value="<?=$get['id']?>">
                </div>
            <?php endforeach; ?>
        </form>
    </header>

    <div class="content-main">

        <form action="search.php" method="post" class="search_container">
            <input type="text" name="search" placeholder="材料のキーワードを入力">
            <input type="submit" name="submit" value="&#xf002">
        </form>

        <div class="content">

         </div>

    </div>

</body>
</html>
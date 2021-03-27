<?php

session_start();

include("funcs.php");
loginCheck();

require_once "./dbc.php";
fileDelete($_POST["id"]);


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
        <h2>削除しました</h2>
        <a href="./chat.php"><img src="./img/家の無料アイコン.png">Chatに戻る</a>
    </header>
    <div class="content-main"></div>

</body>
</html>
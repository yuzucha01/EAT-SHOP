<?php

session_start();

//入力しているかどうかチェック
if(
    !isset($_POST["email"]) || $_POST["email"]=="" ||
    !isset($_POST["message"]) || $_POST["message"]==""
){
    header("Location: form.php");
    exit;
}

//POSTデータの取得
$email  = $_POST["email"];
$message  = $_POST["message"];

//DBと接続
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//DBにデータを送る(form_table)
$stmt = $pdo -> prepare("INSERT INTO form_table(id, email, message, indate)
VALUES(NULL, :a1, :a2, sysdate())");

$stmt->bindValue(':a1', $email, PDO::PARAM_STR);
$stmt->bindValue(':a2', $message, PDO::PARAM_STR);
$stmt->execute();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EAT SHOP</title>
    <link rel="stylesheet" href="css/form.css" />
  </head>
  <body>
    <form id="contact" method="post" action="top-page.php">
      <div class="send">
          <h2>いつもご利用くださいましてありがとうございます<br>送信しました</h2>
          <button type="submit" class="btn">Homeに戻る</button>
      </div>
    </form>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </body>
</html>
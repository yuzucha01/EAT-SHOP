<?php

session_start();

//入力しているかどうかチェック
if(
  !isset($_POST["email"]) || $_POST["email"]=="" ||
  !isset($_POST["password"]) || $_POST["password"]==""
){
  header("Location: signUp.php");
    exit;
}

//POSTデータの取得
$email  = $_POST["email"];
$password  = $_POST["password"];

//OBと接続
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//データベース内のメールアドレスを取得
$stmt = $pdo->prepare("SELECT * from gs_an_table where email = ?");
$res = $stmt->execute([$email]);

$row = $stmt->fetch(PDO::FETCH_ASSOC);

//データベース内のメールアドレスと重複していない場合、登録する。
if (!isset($row['email'])) {
    //データ登録SQLの作成(POSTデータ取得で取得したデータをSQLに入れる)
    $stmt = $pdo -> prepare("INSERT INTO gs_an_table(id, email, password, indate)
    VALUES(NULL, :a1, :a2, sysdate())");

    $stmt->bindParam(':a1', $email, PDO::PARAM_STR);
    $stmt->bindParam(':a2', password_hash($_POST["password"], PASSWORD_BCRYPT), PDO::PARAM_STR);
    $status = $stmt->execute();

    header("Location: index.php");
    exit;
}else{
  //既に登録されたメールアドレスの場合
    header("Location: already.php");
    exit;
}

//エラー処理
if($res==false){
  //SQL実行時にエラーがある場合（エラーオブジェクトを取得して表示）
  $error=$stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //index.phpへリダイレクト
  header("Location: signUp.php");
  exit;
}

  ?>
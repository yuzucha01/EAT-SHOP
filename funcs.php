<?php
//XSS対応関数
function h($val){
    return htmlspecialchars($val,ENT_QUOTES);
}

//ログインしたときユニークキーと同じかチェックする
function loginCheck(){
    if(
        //!をつけることでセットされていないという逆の意味になる
        !isset($_SESSION["chk_ssid"]) ||
        $_SESSION["chk_ssid"]!= session_id()
    ){
        echo "LOGIN ERROR";
        exit();
    }else{
        //古いキーを新しいキーに変更する(セッションハイジャック対策)
        session_regenerate_id(true);
        $_SESSION["chk_ssid"] = session_id();
    }
}

//DB接続
function db(){
    try {
        $pdo = new PDO('mysql:dbname=gs_db; charset=utf8; host=localhost','root','root');
    }catch (PDOException $e){
        exit('DbConnectError:'.$e->getMessage());
    }
        return $pdo;
    }

?>
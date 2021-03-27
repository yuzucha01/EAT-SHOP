<?php
//ファイル保存
//DB接続
//DBへ保存
require_once "./dbc.php";

//ファイル関連の取得
$file = $_FILES['img'];
$filename = basename($file['name']);
$tmp_path = $file['tmp_name'];
$file_err = $file['error'];
$filesize = $file['size'];
$upload_dir = 'img/';
$save_filename = date('YmdHis').$filename;
$err_msgs = array();
$save_path = $upload_dir.$save_filename;

//キャプションを取得
//POSTの確認、サニタイズしてくれる（セキュリテイ面でつける）
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_SPECIAL_CHARS);
$common_name = filter_input(INPUT_POST, 'common_name', FILTER_SANITIZE_SPECIAL_CHARS);
$common = filter_input(INPUT_POST, 'common', FILTER_SANITIZE_SPECIAL_CHARS);
$point = filter_input(INPUT_POST, 'point', FILTER_SANITIZE_SPECIAL_CHARS);

//1.shop項目のバリデーション
//name未入力
if(empty($name)){
    array_push($err_msgs, "<a href='./shop.php'>"."会社名 / 店舗名を入力してください"."<br>");
}
//url未入力
if(empty($url)){
    array_push($err_msgs, "<a href='./shop.php'>"."購入先のURLを入力してください"."<br>");
}
//商品内容未入力
if(empty($common_name)){
    array_push($err_msgs, "<a href='./shop.php'>"."商品名を入力してください"."<br>");
}

//2.ファイルのバリデーション
//ファイルサイズが1MB未満か
if($filesize > 1048576 || $file_err==2){
    array_push($err_msgs, "<a href='./shop.php'>"."ファイルサイズを1MB未満にしてください"."<br>");
}
//拡張は画像形式か
//許容したい拡張子
$allow_ext = array('jpg','jpeg','png');
//データの拡張子の取得
$file_ext = pathinfo($filename, PATHINFO_EXTENSION);
//許容したい拡張子かどうか(拡張子が大文字の場合小文字に変換する関数を組み込む)
if(!in_array(strtolower($file_ext), $allow_ext)) {
    array_push($err_msgs, "<a href='./shop.php'>"."画像ファイルを添付してください"."<br>");
}

if(count($err_msgs) === 0){
    //ファイルはあるかどうか
    //アップロードされているか
    if(is_uploaded_file($tmp_path)){
            if(move_uploaded_file($tmp_path, $save_path)){
                echo $filename. "を".$upload_dir."アップしました";

                //DBに保存(ファイル名、ファイルパス、キャプション)
                $result = shopSave($filename, $save_path, $name, $url, $common_name, $common, $point);
                if($result){
                    header("Location: top-page.php");
                    exit;
                }else{
                    echo "データベースへの保存失敗しました"."<br>";
                }
            }else{
                echo "ファイルが保存できませんでした"."<br>";
            }
    } else {
            echo "ファイルが選択されていません"."<br>";
    }
}else{
    foreach($err_msgs as $msg)
    echo $msg."<br>";
}



?>
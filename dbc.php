<?php

//DBから全データ取得
//PDO::query (エスケープされない)

function dbc()
{
    $host = "localhost";
    $dbname = "gs_db";
    $user = "root";
    $pass = "root";

    $dns = "mysql:host=$host;dbname=$dbname;charset=utf8";
    try{
    $pdo = new PDO($dns,$user, $pass,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    return $pdo;
    }catch(PDOException $e){
        exit($e->getMessage());
    }
}

//------------------------------------CHAT---------------------------------------------------------------------------
// ファイルデータを保存
// @param string $filename ファイル名
// @param string $save_path 保存先のパス
// @param string $name 料理名
// @param string $zairyo 材料
// @param string $recipe レシピ
// @return bool $result

//chatをDBに保存
function fileSave($filename, $save_path, $name, $zairyo, $recipe){
    $result = False;
   //file_tableに保存
    $sql = "INSERT INTO file_table(file_name, file_path, name, zairyo, recipe)
    VALUE(?, ?, ?, ?, ?)";
    try {
        //prepareで準備
        $stmt = dbc()->prepare($sql);
        $stmt->bindValue(1, $filename);
        $stmt->bindValue(2, $save_path);
        $stmt->bindValue(3, $name);
        $stmt->bindValue(4, $zairyo);
        $stmt->bindValue(5, $recipe);
        //実行
        $result = $stmt->execute();
        return $result;
    }catch(Exception $e){
        //エラーページに飛ばす
        echo $e->getMessage();
        return $result;
        }
}

// ファイルデータを取得
// @return array $fileData
function getAllFile(){
    $sql = "SELECT * FROM file_table ORDER BY id DESC";
    $fileData =  dbc()->query($sql);
    return $fileData;
}

//検索
function search() {
    $sql = "SELECT * FROM file_table WHERE name OR zairyo LIKE '%" . $_POST["search"] . "%'";
    $searchData = dbc()->query($sql);
    return $searchData;
}

//CBの変更
//変更するDBをIDから取得
function getFile($id){
    $sql = "SELECT * FROM file_table WHERE id = $id";
    $idFile =  dbc()->query($sql);
    return $idFile;
}
//dbを変更する
function update($id){
    $sql = "UPDATE file_table SET name = :name, zairyo = :zairyo, recipe = :recipe WHERE id = $id";
    $stmt =  dbc()->prepare($sql);
    $stmt->execute(array(':name' => $_POST['name'], ':zairyo' => $_POST['zairyo'], ':recipe' => $_POST['recipe']));
    return $upData;
}

//chatをDBから削除
function fileDelete($id){
    $sql = "DELETE FROM file_table WHERE id = $id";
    $searchData = dbc()->query($sql);
    return $searchData;
}

//------------------------------------SHOP---------------------------------------------------------------------------
// ファイルデータを保存
// @param string $filename ファイル名
// @param string $save_path 保存先のパス
// @param string $name 料理名
// @param string $zairyo 材料
// @param string $recipe レシピ
// @return bool $result

//shopをDBに保存
function shopSave($filename, $save_path, $name, $url, $common_name, $common, $point){
    $result = False;
   //file_tableに保存
    $sql = "INSERT INTO shop_table(file_name, file_path, name, url, common_name, common, point)
    VALUE(?, ?, ?, ?, ?, ?, ?)";
    try {
        //prepareで準備
        $stmt = dbc()->prepare($sql);
        $stmt->bindValue(1, $filename);
        $stmt->bindValue(2, $save_path);
        $stmt->bindValue(3, $name);
        $stmt->bindValue(4, $url);
        $stmt->bindValue(5, $common_name);
        $stmt->bindValue(6, $common);
        $stmt->bindValue(7, $point);
        //実行
        $result = $stmt->execute();
        return $result;
    }catch(Exception $e){
        //エラーページに飛ばす
        echo $e->getMessage();
        return $result;
        }
}

//ファイルデータの取得
function getAllShop(){
    $sql = "SELECT * FROM shop_table ORDER BY id DESC";
    $shopData =  dbc()->query($sql);
    return $shopData;
}

//chatをDBから削除
function shopDelete($id){
    $sql = "DELETE FROM shop_table WHERE id = $id";
    $shopData = dbc()->query($sql);
    return $shopData;
}
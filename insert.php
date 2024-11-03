<?php
//1. POSTデータ取得
//[name,email,age,naiyou]
//9:30~ insert
$name = $_POST["name"];
$email = $_POST["email"];
$question = $_POST["question"];

//2. DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  //$pdo = new PDO('mysql:dbname=megaphone11_gs_db;charset=utf8;host=***','***','***');//さくらサーバー
  $pdo = new PDO('mysql:dbname=liveonce_php02;charset=utf8;host=mysql3102.db.sakura.ne.jp', 'liveonce', 'a4vsAry-s7nBkGk');//local
} catch (PDOException $e) {
  exit('DB_CONECThogehoge:'.$e->getMessage());
}


//３．データ登録SQL作成
$sql = "INSERT INTO gs_an_table(name,email,question,indate)VALUES(:name, :email, :question, NOW())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email', $email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':question', $question, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();//true or false

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("SQL_ERROR:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location:index.php");
  exit();

}
?>
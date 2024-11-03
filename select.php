<?php
//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  //$pdo = new PDO('mysql:dbname=megaphone11_gs_db;charset=utf8;host=***','***','***');//さくらサーバー
  $pdo = new PDO('mysql:dbname=liveonce_php02;charset=utf8;host=mysql3102.db.sakura.ne.jp', 'liveonce', 'XXXXXX');//local
} catch (PDOException $e) {
  exit('DB_CONECT'.$e->getMessage());
}

//２．データ取得SQL作成
$sql="SELECT*FROM gs_an_table";
$stmt = $pdo->prepare("$sql");
$status = $stmt->execute();//true or false


//３．データ表示
//$view="";//無視
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQL_ERROR:".$error[2]);
}


//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
//JSON値を渡す場合に使う
$json = json_encode($values,JSON_UNESCAPED_UNICODE);

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link rel="stylesheet" href="style.css">

<style>
.div{padding: 10px;font-size:16px;}
.td{border:1px solid red}
</style>

</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->


<!-- Main[Start] -->
<div>
    <div class="container jumbotron">
<?php foreach($values as $value){ ?>
  <tr>   
    <td> <p><?=$value["id"]?></p></td>
    <td> <p><?=$value["name"]?></p></td>
    <td> <p><?=$value["email"]?></p></td>
    <td> <p><?=$value["question"]?></p></td>
    <td> <p><?=$value["indate"]?></p></td>
</tr>
<?php } ?>

    </div>
</div>
<!-- Main[End] -->

<script>
  //JSON受け取り
$a = '<?=$json?>';
const obj = JSON.parse($a);
console.log(obj);


</script>
</body>
</html>






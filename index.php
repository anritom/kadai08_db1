<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>職業入力</title>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

    <div class="container">
        <h1>職業入力</h1>
        <form method="POST" action="insert.php">
        <div class="jumbotron">
        <fieldset>
            <label for="name">名前：
            <input type="text" id="name" name="name" required></label><br>
            
            <label for="email">Email：
            <input type="text" id="email" name="email" required></label><br>
            
            <label for="question">職業：
            <textarea name="question" rows="4" required></textarea></label><br>
            
            <input type="submit" value="送信">
            </fieldset>
            </div>
        </form>
    </div>
</body>
</html>
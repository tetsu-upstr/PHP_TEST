<?php

// スーパーグローバル変数 nameの値がkey valueの値がvalue
echo $_GET['name'];


echo '<pre>';
var_dump($_GET);
echo '</pre>';



?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>form</title>
</head>
<body>

<form method="GET" action="input.php">
名前
<input type="text" name="name"></input>

<input type="submit" value="送信">

</form>

</body>
</html>
<?php

// スーパーグローバル変数 nameの値がkey valueの値がvalue
// 連想配列
// echo $_GET['name'];

//フォームの作り方 input.php confirm.php thanks.php ページを切り替えていく方法と
// input.php 1つのファイルで作る方法

echo '<pre>';
var_dump($_POST);
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

<?php if ($pageFlag === 0) : ?>

<?php endif; ?>

<?php if ($pageFlag === 1) : ?>

<?php endif; ?>

<?php if ($pageFlag === 2) : ?>

<?php endif; ?>



<form method="POST" action="input.php">
名前
<input type="text" name="name"></input>
<br>
<input type="checkbox" name="sports[]" value="野球">野球
<input type="checkbox" name="sports[]" value="サッカー">サッカー
<input type="checkbox" name="sports[]" value="バスケ">バスケ

<input type="submit" value="送信">

</form>

</body>
</html>
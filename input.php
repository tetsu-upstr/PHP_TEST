<?php
session_start();

// スーパーグローバル変数 nameの値がkey valueの値がvalue
// 連想配列
// echo $_GET['name'];

//フォームの作り方 input.php confirm.php thanks.php ページを切り替えていく方法と
// input.php 1つのファイルで作る方法

// クリックジャッキング対策
header('X-FRAME-OPTIONS:DENY');

// サニタイズ関数 xxs対策
function h($str) {
  return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

echo '<pre>';
var_dump($_POST);
echo '</pre>';

// 画面遷移の判定
$pageFlag = 0;

if (!empty($_POST['btn_confirm'])) {
  $pageFlag = 1;
}

if (!empty($_POST['btn_submit'])) {
  $pageFlag = 2;
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>form</title>
</head>
<body>

<!-- 確認画面 -->
<?php if ($pageFlag === 1) : ?>
  <!-- セッションのトークンとPOSTで渡ってきたトークンが同じなら確認画面を表示する -->
  <?php if ($_POST['csrf'] === $_SESSION['csrfToken']) : ?>

  <form method="POST" action="input.php">
  名前
  <?php echo h($_POST['your_name']); ?>
  <br>
  メールアドレス
  <?php echo h($_POST['email']); ?>

  <input type="submit" name="back" value="戻る">
  <input type="submit" name="btn_submit" value="送信する">
  <input type="hidden" name="your_name" value="<?php echo h($_POST['your_name']); ?>">
  <input type="hidden" name="email" value="<?php echo h($_POST['email']); ?>">
  </form>
  <?php endif; ?>
<?php endif; ?>

<!-- 送信完了画面 -->
<?php if ($pageFlag === 2) : ?>
送信が完了しました
<?php endif; ?>

<!-- フォーム入力画面 -->
<?php if ($pageFlag === 0) : ?>
<?php
if (!isset($_SESSION['csrfToken'])) {
  // CSRF対策のトークンを16進数で変換
  $csrfToken = bin2hex(random_bytes(32));
  $_SESSION['csrfToken'] = $csrfToken;
}
$token = $_SESSION['csrfToken'];
?>

  <form method="POST" action="input.php">
  名前
  <input type="text" name="your_name" value="<?php echo h($_POST['your_name']); ?>">
  <br>
  メールアドレス
  <input type="email" name="email" value="<?php echo h($_POST['email']); ?>">
  <input type="submit" name="btn_confirm" value="確認する">
  <input type="hidden" name="csrf" value="<?php echo $token; ?>">
  </form>
<?php endif; ?>

</body>
</html>
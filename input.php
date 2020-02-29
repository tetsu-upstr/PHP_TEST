<?php
session_start();

require 'validation.php';

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
$error = validatation($_POST);

if (!empty($_POST['btn_confirm']) && empty($error)) {
  $pageFlag = 1;
}

if (!empty($_POST['btn_submit'])) {
  $pageFlag = 2;
}

?>

<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>

<body>

<!-- 確認画面 -->
<?php if ($pageFlag === 1) : ?>
  <!-- セッションのトークンとPOSTで渡ってきたトークンが同じなら確認画面を表示する -->
  <?php if ($_POST['csrf'] === $_SESSION['csrfToken']) : ?>

  <form method="POST" action="input.php">
  氏名
  <?php echo h($_POST['your_name']); ?>
  <br>
  メールアドレス
  <?php echo h($_POST['email']); ?>
  <br>
  ホームページ
  <?php echo h($_POST['url']); ?>
  <br>
  性別
  <?php if($_POST['gender'] === '0'){ echo '男性';}
        if($_POST['gender'] === '1'){ echo '女性';}
  ?>
  <br>
  年齢
  <?php if($_POST['age'] === '1'){ echo '〜19歳';}
  elseif($_POST['age'] === '2'){ echo '20歳〜29歳';}
  elseif($_POST['age'] === '3'){ echo '30歳〜39歳';}
  elseif($_POST['age'] === '4'){ echo '40歳〜49歳';}
  elseif($_POST['age'] === '5'){ echo '50歳〜59歳';}
  elseif($_POST['age'] === '6'){ echo '60歳〜';}
  ?>
  <br>
  お問い合わせ内容
  <?php echo h($_POST['contact']); ?>
  
  <input type="submit" name="back" value="戻る">
  <input type="submit" name="btn_submit" value="送信する">
  <input type="hidden" name="your_name" value="<?php echo h($_POST['your_name']); ?>">
  <input type="hidden" name="email" value="<?php echo h($_POST['email']); ?>">
  <input type="hidden" name="url" value="<?php echo h($_POST['url']); ?>">
  <input type="hidden" name="gender" value="<?php echo h($_POST['gender']); ?>">
  <input type="hidden" name="age" value="<?php echo h($_POST['age']); ?>">
  <input type="hidden" name="contact" value="<?php echo h($_POST['contact']); ?>">

  <input type="hidden" name="csrf" value="<?php echo h($_POST['csrf']); ?>">
  </form>
  <?php endif; ?>
<?php endif; ?>

<!-- 送信完了画面 -->
<?php if ($pageFlag === 2) : ?>
  <?php if ($_POST['csrf'] === $_SESSION['csrfToken']) : ?>
  送信が完了しました

  <!-- トークンの削除 -->
  <?php unset($_SESSION['csrfToken']); ?>

  <?php endif; ?>
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
  <?php if (!empty($_POST['btn_confirm']) && !empty($error)) :?>
  <ul>
  <?php foreach ($error as $value) :?>
  <li><?php echo $value ; ?></li>
  <?php endforeach ;?>
  </ul>
  <?php endif ;?>

  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <form method="POST" action="input.php">

      <div class="form-group">
        <label for="your_name">氏名</label>
        <input type="text" class="form-control" id="your_name" name="your_name" value="<?php echo h($_POST['your_name']); ?>" required>
      </div>

      <div class="form-group">
        <label for="emai">メールアドレス</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo h($_POST['email']); ?>" required>
      </div>

      <div class="form-group">
        <label for="url">ホームページ</label>
        <input type="url" class="form-control" id="url"  name="url" value="<?php echo h($_POST['url']); ?>" required>
      </div>
    
  <div class="form-check form-check-inline">性別
  <input class="form-check-input" id="gender1" type="radio" name="gender" value="male">
  <label class="form-check-label" for="gender1">男性</label>
  <input class="form-check-input" id="gender2" type="radio" name="gender" value="female">
  <label class="form-check-label" for="gender2">女性</label>
  </div>
  
  <div class="from-group">
    <label for="age">年齢</label>
    <select class="form-control" id="age" name="age"> 
      <option value="">選択してください</option>
      <option value="1">〜19歳</option>
      <option value="2">20歳〜29歳</option>
      <option value="3">30歳〜39歳</option>
      <option value="4">40歳〜49歳</option>
      <option value="5">50歳〜59歳</option>
      <option value="6">60歳〜</option>
    </select>
  </div>
  
  <div class="form-grorp">
    <label for="contact">お問い合わせ内容</label>
    <textarea class="form-control" id="contact" row="3" name="contact" value="<?php echo h($_POST['contact']); ?>"></textarea>
  </div>
  
  <div class="form-check">
    <input class="form-check-input" type="checkbox" id="caution" value="1">注意事項のチェック
    <label class="form-check-label" for="caution">注意事項に同意する</label>
  </div>
  <input class="btn btn-info" type="submit" name="btn_confirm" value="確認する">
  <input type="hidden" name="csrf" value="<?php echo $token; ?>">
  </form>

    </div>
  </div>
</div>

<?php endif; ?>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
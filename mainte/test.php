<?php
// パスワードを記録したファイルの場所
echo __FILE__;
// /opt/lampp/htdocs/PHP_TEST/mainte/test.php

echo '<br>';
// パスワード（暗号化）
echo (password_hash('password123', PASSWORD_BCRYPT));
// $2y$10$CsZggJ8lOr83kynRkXniX.xE4fNoAWDyeZaS3SvpKxY/WfiYpFFbS

// ファイル丸ごと読み込み
$contactFile = '.contact.dat';
$fileContents = file_get_contents($contactFile);

echo $fileContents;

// ファイル書き込み（上書き）
// file_put_contents($contactFile, 'テストです');

// 改行してテキストを追記したい時
$addText = 'テストです' . "\n";

// ファイル書き込み（追記）
// file_put_contents($contactFile, $addText, FILE_APPEND);

// 配列 file,

// テキストファイルを配列として読み込む
$allDate = file($contactFile);

// 配列をforeachで出力
foreach($allDate as $lineDate) {
  $lines = explode(',', $lineDate);
  echo $lines[0]. '<br>';
  echo $lines[1]. '<br>';
  echo $lines[2]. '<br>';
}
<?php
require 'db_connection.php';

// ユーザー入力なし query
// $sql = 'select * from contacts where id = 2';
// $stmt = $pdo->query($sql); // sql実行 ステートメント

// $result = $stmt->fetchall();

// echo '<pre>';
// var_dump($result);
// echo '</pre>';

// ユーザー入力あり prepare bind execute 悪意ユーザ delete * SQLインジェクションでSQL文の入力を防ぐ
$sql = 'select * from contacts where id = :id'; // 名前付きプレースホルダ
$stmt = $pdo->prepare($sql); // プリペアードステートメントを準備 PDOStatementオブジェクトを返す
$stmt->bindValue('id', 3, PDO::PARAM_INT); // ステートメントの紐付け PDO::はオプション
$stmt->execute(); // 実行

$result = $stmt->fetchall();

echo '<pre>';
var_dump($result);
echo '</pre>';

// トランザクション まとまって処理
// (ex 銀行 残高を確認=>Aさんから引き落とし=>Bさんに振込)

$pdo->beginTransaction();

try {

// sql処理
$stmt = $pdo->prepare($sql); // プリペアードステートメントを準備 PDOStatementオブジェクトを返す
$stmt->bindValue('id', 3, PDO::PARAM_INT); // ステートメントの紐付け PDO::はオプション
$stmt->execute(); // 実行

$pdo->commit(); // まとめて実行

} catch (PDOException $e) {

  $pdo->rollback(); // 更新のキャンセル
}
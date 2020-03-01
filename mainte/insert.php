<?php

// DB接続 PDO

function insertContact($data) {
require 'db_connection.php';

// 入力 DB保存 prepare, bind, excute（全て文字列の場合は配列でだす→bindは不要になる）

$params = [
  'id' => null,
  'your_name' => $data['your_name'],
  'email' => $data['email'],
  'url' => $data['url'],
  'gender' => $data['gender'],
  'age' => $data['age'],
  'contact' => $data['contact'],
  'created_at' => null
];

// $params = [
//   'id' => null,
//   'your_name' => 'なまえ123',
//   'email' => 'test@test.com',
//   'url' => 'http://test.com',
//   'gender' => '1',
//   'age' => '2',
//   'contact' => 'いいいい',
//   'created_at' => null
// ];

$count = 0;
$columns = '';
$values = '';

foreach (array_keys($params) as $key) {
  if ($count++>0) {
    $columns .= ',';
    $values .= ',';
  }
  $columns .= $key;
  $values .= ':'.$key;
}

$sql = 'insert into contacts ('. $columns . ')values('. $values .')';

// var_dump($sql);
// exit;

$stmt = $pdo->prepare($sql); // プリペアードステートメントを準備 PDOStatementオブジェクトを返す
$stmt->execute($params); // 実行

}
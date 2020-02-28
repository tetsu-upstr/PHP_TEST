<?php

$members = [
  'name' => '本田',
  'height' => 170,
  'hobby' => 'サッカー'
];

foreach($members as $member) {
  echo $member;
}

echo '<br><br>';

// キーとバリューそれぞれ表示
foreach ($members as $key => $value) {
  echo $key . 'は' . $value . 'です' .'<br>';
}


// こっちの書き方でも一緒
foreach ($members as $member => $value) {
  echo $member . 'は' . $value . 'です' .'<br>';
}

echo '<br><br>';

$members_2 = [
  '本田' => [
    'height' => 170,
    'hobby' => 'サッカー'
  ],
  '香川' => [
    'height' => 168,
    'hobby' => 'サッカー'
  ]
  
];



// 配列の中に配列がある場合（多次元配列）
foreach ($members_2 as $member_1) {
  foreach ($member_1 as $member => $value) {
    echo $member . 'は' . $value . 'です' .'<br>';
    echo '<br>';
  }
}


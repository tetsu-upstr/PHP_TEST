<?php

// function test() {
//   echo 'testです';
// }

// test();


$comment = 'コメント２';
function getComment($String) {
  echo $String;
}

getComment($comment);


function sumPrice($int1, $int2) {
  $int3 = $int1 + $int2;
  return $int3;
}

$total = sumPrice(3, 5);

echo $total;

$text = 'あいうえお';

echo strlen($text);

echo mb_strlen($text);

$str = '文字列を置換します';

echo str_replace('置換', 'ちかん', $str);

// 正規表現 
// 文字かどうか、数字かどうか、郵便番号、メールアドレスかどうか

$str_3 = '特定の文字列が含まれるか確認する';

// trueなら1を返す
echo preg_match('/文字列/', $str_3); 

echo substr('abcde', 1);

echo mb_substr('あいうえお', 1);
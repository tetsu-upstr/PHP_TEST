<?php
//配列に配列を追加する

$array = ['りんご', 'みかん'];

array_push($array, 'ぶどう', 'なし');

echo '<pre>';
var_dump($array);
echo '</pre>';


$postalCode = '123-4567';

function checkPostalCode($str) {
  $replaced = str_replace('-', '', $str);
  $length = strlen($replaced);

  if ($length === 7) {
    return true;
  }
  return false;
}

var_dump(checkPostalCode($postalCode));

echo __DIR__;
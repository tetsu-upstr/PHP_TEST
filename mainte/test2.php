<?php

$contactFile = '.contact.dat';

// fopenのパラメータ mode は、 そのストリームに要するアクセス形式を指定します。
$contents = fopen($contactFile, 'a+');

$addText = '1行追記' . "\n";

fwrite($contents, $addText);

fclose($contents);
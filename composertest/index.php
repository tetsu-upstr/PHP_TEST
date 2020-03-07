<?php

// 一度だけオートロードを呼び出す
require_once __DIR__.'/vendor/autoload.php';

use App\Controllers\TestController;

$app = new TestController;
$app->run();
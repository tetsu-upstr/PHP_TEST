<?php

namespace App\Controllers;

use App\Models\TestModel;

// クラス名はファイル名と同じにする
class TestController {
  public function run() {
    $model = new TestModel;
    echo $model->getHello();
  }
}
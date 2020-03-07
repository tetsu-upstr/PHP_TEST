<?php

namespace App\Models;

// クラス名はファイル名と同じにする
class TestModel {
  private $text = 'hello world';

  public function getHello() {
    return $this->text;
  }
}
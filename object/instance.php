<?php
class Product {

  // 変数
  private $product = [];

  // コンストラクタ クラスを呼び出した初回に起動する
  function __construct($product) {
    $this->product = $product;
  }

  // public
  public function addProduct($item) {
    $this->product .= $item;
  }

  // public static（静的）
  public static function getStaticProduct($str) {
    echo $str;
  }

}

// インスタンス化
$instance = new Product('テスト');

var_dump($instance);

$instance->addProduct('追加分');
echo '<br>';

// 静的（static）クラス名::関数名 インスタンスを作らずに使える
Product::getStaticProduct('静的');
echo '<br>';

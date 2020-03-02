<?php

// インターフェース
interface ProductInterface {
  // メソッドしか書けない
  public function getProduct();
}

// インターフェース
interface NewInterface {
  // メソッドしか書けない
  public function getNews();
}

// 具象クラス、親クラス（基底クラス・スーパークラス）
class BaseProduct {
  // 変数 関数
  public function echoProduct() {
    echo '親クラスです';
  }
  
  // オーバーライド
  public function getProduct(){
    echo '親の関数です';
  }
}

// 子クラス（派生クラス・サブクラス） インターフェースは複数継承できる
class Product implements ProductInterface, NewInterface {

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

  public function getNews() {
    echo 'ニュースです';
  }

  public function getProduct(){
    echo $this->product;
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

// オーバーライドしたメソッド
$instance->getProduct();
echo '<br>';

// インターフェースから継承したメソッド
$instance->getNews();

// 継承するとインスタンス化した後に親クラスのメソッドが使える
// $instance->echoProduct();

// 静的（static）クラス名::関数名 インスタンスを作らずに使える
// Product::getStaticProduct('静的');
// echo '<br>';

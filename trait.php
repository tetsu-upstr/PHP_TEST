<?php

trait ProductTrait {
  public function getProduct() {
    echo 'プロダクト';
  }
}

trait NewsTrait {
  public function getNews() {
    echo 'ニュース';
   }
}

class Product {

  // クラスは単一継承に対してトレイトは複数使える
  use ProductTrait;
  use NewsTrait;

  public function getInformation() {
    echo 'クラスです';
  }
}

$product = new Product();

// クラスのインスタンスのメソッドからトレイとのメソッドが使える
$product->getInformation();
echo '<br>';
$product->getProduct();
echo '<br>';
$product->getNews();
echo '<br>';
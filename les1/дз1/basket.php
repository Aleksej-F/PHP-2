<?php
include "productBasket.php";
class Basket{
   private $products = [];
   private $sumBasket = 0;

   function __construct(){
      $this->products = [];
      $this->sumBasket = 0;
   }
   //  
   
   function productToBasket($product){
      $this->products = $product;
      $this-> sumBasket += $product->count * $product->price;
   }
   
   function productDelBasket($prod){
      $this->products= array_filter($this->products, $var['title'] !== $prod ['title'] );
      $this-> sumBasket -= $prod->count * $prod->price;
   }

   function productCountBasket($prod, $n){
      
   }

   function info(){
      foreach ($this->products as $product){
         echo "Название {$product->title} цена {$product->price} кол-во 
         {$product->count}  стоимость: {$product->count} * {$product->price} <br>";
         
      }
      echo "<hr>общая стоимость {$this-> sumBasket} у.е.";
   }
}

$bas = new Basket();

$bas->productToBasket();

$bas->info();
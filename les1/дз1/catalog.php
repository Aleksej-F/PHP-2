<?php
include "product.php";
class Catalog{
   private $products = [];
   
   function __construct($products){
      $this->createCatalog($products);
   }
    
   function createCatalog($products){
      foreach ($products as $product){
        
         $this->products[] = new Product($product['title'], $product['price'],$product['img'],$product['description']);
      }

   }

   function info(){}

     
}

new Catalog($products);
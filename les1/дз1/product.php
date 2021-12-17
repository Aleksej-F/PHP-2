<?php
class Product
{
   private $title;
   private $price;
   private $img;
   private $description;

   public function getPrice()
   {
      return $this->price;
   }
   public function getTitle()
   {
      return $this->title;
   }
   public function getImg()
   {
      return $this->img;
   }
   public function getDescription()
   {
      return $this->description;
   }

   function __construct($title, $price, $img, $description)
   {
      $this->title = $title;
      $this->price = $price;
      $this->img = $img;
      $this->description = $description;
   }
}
<?php
include "product.php";

class ProductBasket extends Product{
    private $count;
    
    public function __construct($title, $price, $img, $count)
    {
        parent::__construct($title, $price, $img);
        $this->count = $count;
    }

   
}

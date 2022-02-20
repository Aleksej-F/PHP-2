<?php
abstract class Product{
    private $title;
    private $price;

    abstract function totalСost();

}

class DigitalGoods extends Product {
    function totalСost() {

    }
}

class PieceGoods extends Product {
    private $quantity;
    
    function totalСost() {
        return $this->quantity * $this->price;
    }
}

class WeightGoods extends Product {
    private $weight;
    
    function totalСost() {
        return $this->weight * $this->price;
    }
}



<?php
session_start();

// Конттроллер страницы корзины.
//include_once('c/C_Base.php');
//include_once('m/M_Basket.php');

class C_Basket extends C_Base {
   private $basketM;
   public function __construct(){
      $this->basketM = new M_Basket();
      
   }

   //  <a href="index.php?c=details&act=details& img=$data['img']  &id=$data['id']" 
  
   public function action_basket(){
		$this->title .= '::Корзина';
     
      $idUser = $_SESSION['userId']?$_SESSION['userId']:0;
      $text = $this->basketM->basket($idUser);
      $basketText = (count($text) > 0) ? '':'В корзине нет товаров'; 
         
      $this->content = $this->Template('v/v_basket.php', array('basket' => $text, 'basketText' => $basketText));	
   }

   public function update_basket(){
		      
      $idUser = $_SESSION['userId']?$_SESSION['userId']:0;
      $text = $this->basketM->basket($idUser);
      $basketText = (count($text) > 0) ? '':'В корзине нет товаров'; 
         
      return $this->Template('v/v_basket.php', array('basket' => $text, 'basketText' => $basketText));	
   }
}
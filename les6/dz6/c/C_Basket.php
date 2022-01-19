<?php
session_start();

// Конттроллер страницы корзины.

include_once('m/M_Basket.php');

class C_Basket extends C_Base {

   //  <a href="index.php?c=details&act=details& img=$data['img']  &id=$data['id']" 
  
   public function action_basket(){
		$this->title .= '::Корзина';
      $basket = new M_Basket();
      $id=$_GET['id'];
      $text = $basket->basket($id);
      $this->content = $this->Template('v/v_basket.php', array('basket' => $text));	
   }
}
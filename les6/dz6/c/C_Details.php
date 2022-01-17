<?php
session_start();

// Конттроллер страницы информации о продукте.

include_once('m/M_Details.php');

class C_Details extends C_Base {

   //  <a href="index.php?c=details&act=details& img=$data['img']  &id=$data['id']" 
   public function action_details(){
		$this->title .= '::Подробная информация';
      $product = new M_Details();
      $id=$_GET['id'];
      
      $text = $product->product($id);

		$this->content = $this->Template('v/v_details.php', array('data' => $text));	

   }
}
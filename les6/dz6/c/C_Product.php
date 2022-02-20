<?php
session_start();

// Конттроллер страницы информации о продукте.

//include_once('m/M_Details.php');

class C_Product extends C_Base {

   //  <a href="index.php?c=details&act=details& img=$data['img']  &id=$data['id']" 
   public function action_details(){
		$this->title .= '::Подробная информация';
      $product = new M_Product();
      $id=$_GET['id'];
      
      $text = $product->product($id);

		$this->content = $this->Template('v/v_detailsproduct.php', array('data' => $text));	

   }

   public function action_editproduct(){
		$this->title .= '::Редактирование информации о товаре';
      $product = new M_Product();
      $id=$_GET['id'];
      
      $text = $product->product($id);

		$this->content = $this->Template('v/v_editproduct.php', array('data' => $text));	

   }

   public function action_saveEditProduct(){
		$this->title .= '::Редактирование информации о товаре';
      $product = new M_Product();
      $id=$_POST['id'];
      $message = $product->saveEditProduct();;
      $text = $product->product($id);
     
		$this->content = $this->Template('v/v_editproduct.php', array('data' => $text,'message' =>$message));	

   }
}
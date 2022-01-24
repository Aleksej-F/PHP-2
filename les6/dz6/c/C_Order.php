<?php
session_start();

// Конттроллер страницы оформления заказа.

class C_Order extends C_Base {
	private $name = " ";
	
	public function action_makingorder(){
		//$order = new M_Order();
		$this->title .= '::Оформление заказа';
		$this->content = $this->Template('v/v_order.php', array('text' => $info,'message' => $this->name));
	}
}
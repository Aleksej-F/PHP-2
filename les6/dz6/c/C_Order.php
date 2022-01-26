<?php
session_start();

// Конттроллер страницы оформления заказа.

class C_Order extends C_Base {
	private $name = "Specify the delivery address";
	// переход на страницу оформления заказа
	public function action_makingorder(){
		// $order = new M_Order();
		$this->title .= '::Оформление заказа';
		$this->content = $this->Template('v/v_order.php', array('text' => $info,'name' => $this->name));
	}
	
	// завершение оформления заказа
	public function action_finishOrder(){
		$order = new M_Order();
		
		$this->name = $order->finishOrder();
		$this->content = $this->Template('v/v_order.php', array('text' => $info,'name' => $this->name));
	}
}
<?php
//
// Конттроллер страницы чтения.
//
include_once('m/M_Page.php');

class C_Page extends C_Base
{
	//
	// нет конструктора в C_BASE, поэтому убрали конструктор из текущего класса
	//
	
	public function action_index(){
		$catalog = new M_Catalog();
		
		
		$this->title .= '::Главная';
		$text = $catalog->catalog();
		
		//$today = date();
		$this->content = $this->Template('v/v_catalog.php', array('catalog' => $text));	
	}
	
    
	
}

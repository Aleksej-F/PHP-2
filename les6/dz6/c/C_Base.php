<?php
//
// Базовый контроллер сайта.
//
//include_once('c/C_Controller.php');
abstract class C_Base extends C_Controller
{
	protected $title;			// заголовок страницы
	protected $content;		// содержание страницы
   protected $keyWords;


   protected function before(){

		$this->title = 'Shop';
		$this->content = '';
		$this->keyWords="...";

	}
	
	//
	// Генерация базового шаблона
	//	
	public function render()
	{
		$vars = array('title' => $this->title, 'content' => $this->content,'kw' => $this->keyWords);
		$page = $this->Template('v/v_main.php', $vars);				
		echo $page;
	}	
}

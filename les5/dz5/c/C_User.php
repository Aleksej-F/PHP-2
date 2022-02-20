<?php
session_start();

// Конттроллер страницы пользователя.

include_once('m/M_User.php');

class C_User extends C_Base {
	private $name = " ";
	
	public function action_auth(){
		$this->title .= '::Авторизация';
      $user = new M_User();
		// if($this->isPost())
		// {
		// 	print_r(' авторизация '.$_POST['email'].'   - '. $_POST['pass']);
		// 	$info = $user->auth($_POST['email'], $_POST['pass']);
		// 	// text_set($_POST['text']);
		// 	// header('location: index.php');
		// 	// exit();
		// }
		
		if($_POST){
			
			if ($_POST['login']) {
				//print_r(' 1-авторизация ');
				$login = $_POST['email']? strip_tags($_POST['email']) : "";
				$pass = trim(strip_tags($_POST['pass']));
				$this->name = $user->auth($login, $pass);
				
				
				
			}elseif($_POST['avtoriz']){
				//print_r(' 2-регистрация ');
				$name = trim(strip_tags($_POST['name']));
				$surname = trim(strip_tags($_POST['surname']));
				$login = $_POST['email']? trim(strip_tags($_POST['email'])):"";
				$pass = trim(strip_tags($_POST['pass']));
				$rez = $user->registr($name, $surname, $login, $pass);
				if ($rez) {
					$this->name = 'Вы успешно зарегистрировались';
				}
			}
			
			elseif($_POST['goout']){
				//print_r(' 3-выход ');
				$user->goout();
			}
		}

		if (isset($_SESSION['user'])) {
			 $info = "Добро пожаловать!";
			 $this->content = $this->Template('v/v_profile.php', array('text' => $info,'name' =>$_SESSION['name']. ' '.$_SESSION['surname'].'<br><br>'.$this->name));
			
		} else {
			$info = "Пользователь не авторизован!";
			$this->content = $this->Template('v/v_auth.php', array('text' => $info,'name' => $this->name));
		}
		
	}
	

}

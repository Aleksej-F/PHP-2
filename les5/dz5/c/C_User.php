<?php
session_start();

// Конттроллер страницы пользователя.

include_once('m/M_User.php');

class C_User extends C_Base
{
	
	
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
				print_r(' 1-gавторизация ');
				$login = $_POST['email']? strip_tags($_POST['email']) : "";
				$pass = trim(strip_tags($_POST['pass']));
				$info = $user->auth($login, $pass);
			
			}elseif($_POST['avtoriz']){
				print_r(' 1-регистрация ');
				$name = trim(strip_tags($_POST['name']));
				$surname = trim(strip_tags($_POST['surname']));
				$login = $_POST['email']? trim(strip_tags($_POST['email'])):"";
				$pass = trim(strip_tags($_POST['pass']));
				$user->registr($name, $surname, $login, $pass);
			}
			
			elseif($_POST['goout']){
				print_r(' 1-выход ');
				$user->goout();
			}

			
		}

		if (isset($_SESSION['user'])) {
			$info = "Добро пожаловать!";
			$this->content = $this->Template('v/v_profile.php', array('text' => $info));
		} else {
			$info = "Пользователь не авторизован!";
			$this->content = $this->Template('v/v_auth.php', array('text' => $info));
		}
		
		
		


			
	}
	

}

<?php
session_start();

// Конттроллер страницы пользователя.

include_once('m/M_User.php');

class C_User extends C_Base {
	private $name = " ";
	
	public function action_auth(){
		$this->title .= '::Авторизация';
      $user = new M_User();
				
		if($_POST){
			
			if ($_POST['login']) {
				//print_r(' 1-авторизация ');
				$login = $_POST['email']? strip_tags($_POST['email']) : "";
				$pass = trim(strip_tags($_POST['pass']));
				$this->name = $user->auth($login, $pass);
				
				
				
			}elseif($_POST['registr']){
				print_r(' 2-регистрация ');
				$login = trim(strip_tags($_POST['email']));
				$rez = $user->getUserRegMail($login);
				if ($rez) {
					$this->name = 'Пользователь с таким email уже зарегистрирован!';
					$this->content = $this->Template('v/v_register.php', array('text' => $info,'name' => $this->name));
					return;
				}
				
				$name = trim(strip_tags($_POST['name']));
				$surname = trim(strip_tags($_POST['surname']));
				
				$pass = trim(strip_tags($_POST['pass']));
				$phone = trim(strip_tags($_POST['phone']));
				$rez = $user->registr($name, $surname, $phone ,$login, $pass);
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
			$this->content = $this->Template('v/v_checkout.php', array('text' => $info,'name' => $this->name));
		}//v/v_checkout.php   v/v_auth.php
		
	}
	//переход на страницу регистрации
	public function action_registr(){
		$this->title .= '::Регистрация';
      $user = new M_User();
		
		
		if($_POST){
			//запрос на регистрацию
			if($_POST['registr']){
				print_r(' 2-регистрация ');
				$login = trim(strip_tags($_POST['email']));
				$rez = $user->getUserRegMail($login);
				print_r('проверка уникальности - ');
				print_r($rez);
				if ($rez) {
					$this->name = 'Пользователь с таким email уже зарегистрирован!';
					$this->content = $this->Template('v/v_register.php', array('text' => $info,'name' => $this->name));
					return;
				}
				
				$name = trim(strip_tags($_POST['name']));
				$surname = trim(strip_tags($_POST['surname']));
				$phone = trim(strip_tags($_POST['phone']));
				$pass = trim(strip_tags($_POST['pass']));

				print_r('регистрирую');
				$rez = $user->getUserRegistr($name, $surname, $phone ,$login, $pass);

				print_r('результат регистрации -');
				print_r($rez);
				if ($rez) {
					$this->name = 'Вы успешно зарегистрировались';
				}
			}

		}

		$this->content = $this->Template('v/v_register.php', array('text' => $info,'name' => $this->name));
	
	}
	

}

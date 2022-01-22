<?php
session_start();
spl_autoload_register (function ($classname){
	if (substr($classname, 0, 1)== 'C'){
		include_once("c/$classname.php");
   }elseif (substr($classname, 0, 1)== 'M'){
      include_once("m/$classname.php");
   }elseif (substr($classname, 0, 1)== 'K'){
      include_once("config/$classname.php");
   }
});


//site.ru/index.php?act=auth&c=User

$action = 'action_';
$action .=(isset($_GET['act'])) ? $_GET['act'] : 'index';

switch ($_GET['c'])
{
	case 'basket':
		$controller = new C_Basket();
		break;
	case 'User':
		$controller = new C_User();
		break;
	case 'details':
		$controller = new C_Details();
		break;
	default:
		$controller = new C_Catalog();
}

$controller->Request($action);

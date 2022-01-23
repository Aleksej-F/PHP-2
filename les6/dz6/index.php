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
	case 'product':
		$controller = new C_Product();
		break;
	default:
		$controller = new C_Catalog();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
switch ($_POST['c'])
{
	case 'basket':
		$controller = new C_Basket();
		break;
	case 'User':
		$controller = new C_User();
		break;
	case 'product':
		if (isset($_POST['act'])) {
			$action = 'action_'.$_POST['act'];
		}
		$controller = new C_Product();
		break;
	default:
		$controller = new C_Catalog();
}}


$controller->Request($action);

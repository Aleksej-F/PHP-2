<?php
session_start();

spl_autoload_register (function ($classname){
	if (substr($classname, 0, 1)== 'C'){
		include_once("c/$classname.php");
    } elseif (substr($classname, 0, 1)== 'M'){
        include_once("m/$classname.php");
    }elseif (substr($classname, 0, 1)== 'K'){
        include_once("config/$classname.php");
    }
});

$basket = new M_Basket();
$user = new M_User();
$controls = new C_Basket();
$controlsUser = new C_User();

$action = $_POST['action'];
$reviews = $_POST['reviews'];
$id = $_POST['idProduct'];
$idUser = $_SESSION['userId']?$_SESSION['userId']:0;
$count = $_POST['count'];
$obkt = $_POST['obkt'];
$login = $_POST['email'];
$pass = $_POST['pass'];


switch($action){
    case "отправить":
        if (isset($_SESSION['userRights']) && $_SESSION['userRights']==='user') {
            $sql = "INSERT INTO reviews  VALUES (NULL, '$idUser', '$reviews', $id)"; 
            $res = mysqli_query($connect,$sql);
        
            header("Location: details.php?id=$id");
            if($res){
                header("Location: details.php?id=$id");
            }else {
                echo "Ошибка записи!".$id;
            }
        }else{
            header("Location: details.php?id=$id&ses='true'");
        }
       
    break;
    
    case "basket":
        if (!isset($_SESSION['userRights']) && !isset($_SESSION['userId'])) {
            $user->getUserGuest();
        }   
        $idUser = $_SESSION['userId']?$_SESSION['userId']:0;
        $basket->basketAddProduct($id, $idUser);
    break;    

    case "delBasketProduct":
        $basket->basketDel($id, $idUser);
        $text = $controls->update_basket();
        echo $text;
    break;
   
    case "countBasket":
        $basket->basketCount($idUser,$id,$count);
        $text = $controls->update_basket();
        echo $text;
    break;    

    case "clearBasket":
        $basket->basketClear($idUser);
        $text = $controls->update_basket();
        echo $text;
    break;  
    
    case "logIn":
        $rez = $user->auth($login, $pass);
        $text = $controlsUser->update_auth($rez);
        echo $text;
    break; 
    
    case "goOut":
        $_SESSION = [];
        $rez ="Вы не авторизованы.<br> Пройдите регистрацию или авторизуйтесь!";
        $text = $controlsUser->update_auth($rez, '');
        echo $text;
    break;

    default:
        echo "Я не могу такие операции";    
}

  
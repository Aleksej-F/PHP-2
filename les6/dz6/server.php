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

$action = $_POST['action'];
$reviews = $_POST['reviews'];
$id = $_POST['idProduct'];
$idUser = $_SESSION['userId']?$_SESSION['userId']:0;
$count = $_POST['count'];
$obkt = $_POST['obkt'];
$login = $_POST['email'];
$pass = $_POST['pass'];
//print_r($reviews);
// $_SESSION['rez'] = '';
// $_SESSION['error'] ='';
//$_SESSION['userId'] = $user['id'];
//$_SESSION['userRights'] = $user['rights'];

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
        print_r('добавить товар в корзину');
        print_r($_SESSION);
        if (!isset($_SESSION['userRights']) && !isset($_SESSION['userId'])) {
            print_r('авторизации нет');
            $user->getUserGuest();
        }   
        print_r($_SESSION);
        $idUser = $_SESSION['userId']?$_SESSION['userId']:0;

        $basket->basketAddProduct($id, $idUser);
        echo $_SESSION;
       // header("Location: index.php");
       
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
        $basket->basketClear();
        $text = $controls->update_basket();
        echo $text;
    break;  
    
    case "logIn":
        $rez = $user->auth($login, $pass);
        //$text = $controlsUser->update_basket($rez);
        echo $rez.' - '.$login . " -   ". $pass;
    break; 
    
    case "goOut":
        $_SESSION = [];
        header("Location: checkout.php?success=false");
    break;

    default:
        echo "Я не могу такие операции";    
}

  
<?php
session_start();

include "./config/config.php";
include "./config/configPdo.php";
//session_start();

$action = $_POST['action'];
$reviews = $_POST['reviews'];
$id = $_POST['idProduct'];
$idUser = $_SESSION['userId']?$_SESSION['userId']:0;
$count = $_POST['count'];
$obkt = $_POST['obkt'];
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
        if (!isset($_SESSION['userRights']) && !isset($_SESSION['userId'])) {
            getUserGuest($connect);
        }   
        $idUser = $_SESSION['userId']; 
        $sql = "select id from basket where id_user=$idUser and id_product=$id;";
        $res = mysqli_query($connect,$sql) or die("Error: ".mysqli_error($connect));
        if(mysqli_num_rows($res)){
            $sql = "UPDATE `basket` SET `count` = count+1 WHERE id_user=$idUser and id_product=$id;";
            $res = mysqli_query($connect,$sql);
            //echo "колличество товаров увеличено!";
        }else {
            $sql = "INSERT INTO `basket` (`id`, `id_user`, `id_product`, `count`) VALUES (NULL, $idUser, $id, 1)";
            $res = mysqli_query($connect,$sql);
           // echo "товар добавлен в корзину";
        }
        header("Location: index.php?id=$id");
       
    break;    

    case "delBasket":
        
        $sql = "DELETE FROM `basket` WHERE id_user=$idUser and id_product=$id";
        $res = mysqli_query($connect,$sql) or die("Error: ".mysqli_error($connect));
       
        header("Location: shoppingCart.php");
       
    break;
      
    case "delBasketMini":
        
        $sql = "DELETE FROM `basket` WHERE id_user=$idUser and id_product=$id";
        $res = mysqli_query($connect,$sql) or die("Error: ".mysqli_error($connect));
      
            header("Location:templates/basketCard.php?del='delmin'");
       
    break;  

    case "countBasket":
        $sql = "select id from basket where id_user=$idUser and id_product=$id;";
        $res = mysqli_query($connect,$sql) or die("Error: ".mysqli_error($connect));
        if(mysqli_num_rows($res)){
            $sql = "UPDATE `basket` SET `count` = $count WHERE id_user=$idUser and id_product=$id;";
            $res = mysqli_query($connect,$sql);
            //echo "колличество товаров изменено!";
        }else {
            $sql = "INSERT INTO `basket` (`id`, `id_user`, `id_product`, `count`) VALUES (NULL, $idUser, $id, 1)";
            $res = mysqli_query($connect,$sql);
           // echo "товар добавлен в корзину";
        }
        header("Location: shoppingCart.php?id=$id");
    break;    

    case "clearBasket":
        $sql = "DELETE FROM `basket` WHERE `basket`.`id_user` = $idUser;";
        $res = mysqli_query($connect,$sql) or die("Error: ".mysqli_error($connect));
       
        header("Location: shoppingCart.php?");
    break;  
    
    case "logIn":
        
        $mail = $_POST['mail'] ? strip_tags($_POST['mail']) : "";
        $salt = "sldfjsklfdj23lfd0,.sd";
        $pass = trim(strip_tags($_POST['pass']));
        $pass = $salt.md5($pass).$salt;
        
        $sql = "select id, rights from user where mail='$mail' and password='$pass'";
        $res = mysqli_query($connect,$sql) or die("Error: ".mysqli_error($connect));
       
        //print_r( mysqli_fetch_assoc($res));
        if(mysqli_num_rows($res)){
            $user = mysqli_fetch_assoc($res);
            $userIdAuthorized = $user['id'];
            $rights = $user['rights'];
            $sql = "select * from basket where id_user=$idUser ;";
            
             $res = mysqli_query($connect,$sql) or die("Error: ".mysqli_error($connect));
           
            print_r($res);
            //exit;
            //while($reviews = mysqli_fetch_assoc($res))
            
            if(mysqli_num_rows($res)){
                $n = mysqli_num_rows($res);
                for($i = 0; $i < $n; $i++) {
                    $row = mysqli_fetch_assoc($result);
                    $id =  $row['id'];
                    setcookie("$id", $id);
                    $sql = "UPDATE `basket` SET `id_user` = $userIdAuthorized WHERE id=$id;";
                    $res = mysqli_query($connect,$sql);
                }
            }

            $_SESSION['userId'] = $userIdAuthorized;
            $_SESSION['userRights'] = $rights;
                       
            setcookie("userId",$user['id']);
            setcookie("userRights",$user['rights']);
            header("Location: checkout.php?success=true");
            //  echo "{session:true, rights: {$rights}}";
            //  echo "true";
        }else {
            header("Location: checkout.php?success=false");
            // echo "false";
        }
    break; 
    case "goOut":
        $_SESSION = [];
        header("Location: checkout.php?success=false");
    break;

    case "viewMore":
        
        header("Location:templates/product.php?view='viewMore'&id=$id");
        
        // $sql = "SELECT * FROM `product` where id>'$id' LIMIT 2";
        // $res = mysqli_query($connect,$sql) or die("Error: ".mysqli_error($connect));
        // print_r($res);

        // try
        // {
        //     // соединяемся с базой данных
        //     $connect_str = DB_DRIVER . ':host='. DB_HOST . ';dbname=' . DB_NAME;
        //     $db = new PDO($connect_str,DB_USER,DB_PASS);
        //     // теперь выберем несколько строчек из базы
        //     $result = $db->query("SELECT * FROM `product` where id>'$id' LIMIT 2");
        //     // в случае ошибки SQL выражения выведем сообщене об ошибке
        //     $error_array = $db->errorInfo();
        //     if($db->errorCode() != 0000)
        //     echo "SQL ошибка: " . $error_array[2] . '<br /><br />';
        //     // теперь получаем данные из класса PDOStatement
        //     $row = $result->fetchAll(PDO::FETCH_ASSOC);
        //     echo json_encode($row);
           
	    // }
        // catch(PDOException $e)
        // {
        //     die("Error: ".$e->getMessage());
        // }
        
        //echo $row; 
        // print_r($row);
        //header("Location: index.php?row=$row");
        
    break;



    default:
        echo "Я не могу такие операции";    
}



//создаем гостевую запись
function getUserGuest($connect){
    $rnd = rand(1000,5000);
    $name = "$rnd".date("w").time();
    $sql = "INSERT INTO `user` (`id`, `name`, `surname`, `password`, `phone`, `mail`, `rights`) VALUES (NULL, '$name', '1','1', '1','1','guest')"; 
    $res = mysqli_query($connect,$sql);
    $sql = "select id, rights from user where name='$name' and rights='guest'";
    $res = mysqli_query($connect,$sql) or die("Error: ".mysqli_error($connect));

    if(mysqli_num_rows($res)){
        $user = mysqli_fetch_assoc($res);
        $_SESSION['userId'] = $user['id'];
        $_SESSION['userRights'] = $user['rights'];
       
        setcookie("userId",$user['id']);
        setcookie("userRights",$user['rights']);
    }
};
  
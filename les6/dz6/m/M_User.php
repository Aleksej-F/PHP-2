<?
session_start();

class M_User {
    private $config;

    public function __construct(){
        $this->config = new K_Config();
    }

    function passv($pass) {
        $salt = "sldfjsklfdj23lfd0,.sd";
        $pass = $salt.md5($pass).$salt;
        return $pass;
    }

	function auth($login, $pass){
        $rez = 'falze';
        $pass = $this->passv($pass);
        $sql = "select * from user where mail='$login' ";
        $connect = $this->config->connectingPDO();
        $user = $connect->query($sql)->fetch();
        
        if($user){
            // print_r($user['password']);
            // print_r($user['password']);
            if ($user['password'] == $pass) {
               //id гостевой записи
                $us = $_SESSION['userId'];
                //id авторизовывающегося пользователя
                $userIdAuthorized = $user['id'];
                $sql = "select * from basket where id_user=$us";
                $basket = $connect->query($sql);
                if ($basket) {
                    $basket = $basket->fetchAll();
                    
                    $n = count($basket);
                    for($i = 0; $i < $n; $i++) {
                        $row = $basket[$i];
                        $id =  $row['id'];
                        $sql = "UPDATE `basket` SET `id_user` = $userIdAuthorized WHERE id=$id;";
                        $connect->query($sql);
                    }
                }
                
                $_SESSION['user'] = $user['rights'];
                $_SESSION['userRights'] = $user['rights'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['surname'] = $user['surname'];
                $_SESSION['userId'] = $user['id'];
                return 'Вы успешно авторизовались';
            }else {
                return  'Пароль не верный!';
            }
        }else {
            return  'Пользователь с таким логином не зарегистрирован!';
        }
    }
    // выход личного кабинета
    function goout(){
        $_SESSION = [];
    }
    //регистрация нового пользователя
    function getUserRegistr($name, $surname, $phone ,$email, $pass) {
        $pass = $this -> passv($pass);
        $sql = "INSERT INTO `user` (`id`, `name`, `surname`,`phone`, `password`, `mail`, `rights`) VALUES (NULL, '$name','$surname','$phone','$pass','$email','user')"; 
        $connect = $this->config->connectingPDO();
        $q = $connect->query($sql);
        //print_r($q);
        if ($q->errorCode() != PDO::ERR_NONE) {
            $info = $q->errorInfo();
            die($info[2]);
        }
        $sql = "SELECT id, rights FROM `user` WHERE mail='$email' ";
        $userNew = $connect->query($sql)->fetch();

        return $userNew;
    }

    //создаем гостевую запись
    function getUserGuest(){

        $rnd = rand(1000,5000);
        $name = "$rnd-".date("w").time();
        $sql = "INSERT INTO `user` (`id`, `name`, `surname`, `password`, `phone`, `mail`, `rights`) VALUES (NULL, $name, '1','1', '1','1','guest')"; 
        print_r('</br>'.'создаю гостевую запись'.'</br>'); 
           
        $connect = $this->config->connectingPDO();
        $q = $connect->query($sql);
        print_r($q); 
        if ($q->errorCode() != PDO::ERR_NONE) {
            $info = $q->errorInfo();
            die($info[2]);
        }
        $sql = "SELECT id, rights FROM user WHERE name=$name and rights='guest'";
        $user = $connect->query($sql)->fetch();
        print_r($user);
        if($user){
            $_SESSION['userId'] = $user['id'];
            $_SESSION['userRights'] = $user['rights'];
        }
        print_r($_SESSION);
    }

    //проверка email пользователя на существование в БД
    function getUserRegMail($mail){
        $sql = "SELECT id FROM `user` WHERE mail='$mail'";
        $connect = $this->config->connectingPDO();
        $res = $connect->query($sql)->fetch();
        return $res;
    }

}
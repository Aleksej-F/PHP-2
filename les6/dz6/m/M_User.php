<?
session_start();
include_once("config/config.php");



class M_User {
    private $config;

    public function __construct(){
        $this->config = new Config();
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
                $rights = $user['rights'];
                $_SESSION['user'] = $rights;
                $_SESSION['userRights'] = $user['rights'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['surname'] = $user['surname'];
                $_SESSION['userId'] = $user['id'];
                return 'Вы успешно авторизовались';
            }else {
                return 'Пароль не верный!';
            }
        }else {
            return 'Пользователь с таким логином не зарегистрирован!';
        }
    }

    function goout(){
        $_SESSION = [];
    }

    function getUserRegistr($name, $surname, $phone ,$email, $pass) {
        $pass = $this -> passv($pass);

        $sql = "INSERT INTO `user` (`id`, `name`, `surname`,`phone`, `password`, `mail`, `rights`) VALUES (NULL, '$name','$surname','$phone','$pass','$email','user')"; 
        $connect = $this->config->connectingPDO();
        $q =$connect->query($sql);
        print_r($q);
        if ($q->errorCode() != PDO::ERR_NONE) {
            $info = $q->errorInfo();
            die($info[2]);
        }
        $sql = "select id, rights from user where mail='$email' ";
        $userNew = $connect->query($sql)->fetch();


        $sql = "SELECT id, rights FROM `user` WHERE mail='$mail'";
        $connect = $this->config->connectingPDO();
        $res = $connect->query($sql)->fetch();

        if($userNew){
            $_SESSION['userId'] = $userNew['id'];
            $_SESSION['userRights'] = $userNew['rights'];
        }
        
        
        
        return $userNew;
    }

    //создаем гостевую запись
    function getUserGuest(){
        $rnd = rand(1000,5000);
        $name = "$rnd-".date("w").time();
        $sql = "INSERT INTO `user` (`id`, `name`, `surname`, `password`, `phone`, `mail`, `rights`) VALUES (NULL, '$name', '1','1', '1','1','guest')"; 
                
        $connect = $this->config->connectingPDO();
        $connect->query($sql)->fetch();
        
        $sql = "select id, rights from user where name='$name' and rights='guest'";
        $user = $connect->query($sql)->fetch();

        if($user){
            $_SESSION['userId'] = $user['id'];
            $_SESSION['userRights'] = $user['rights'];
        }
    }

    //проверка email пользователя
    function getUserRegMail($mail){
        $sql = "SELECT id FROM `user` WHERE mail='$mail'";
        $connect = $this->config->connectingPDO();
        $res = $connect->query($sql)->fetch();
       
        
        return $res;
    }

}
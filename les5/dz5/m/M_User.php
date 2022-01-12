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
       // $connect = $this->config->connect() or die("Error: ".mysqli_error($connect));
       //$res = mysqli_query($connect,$sql) or die("Error: ".mysqli_error($connect));
    //    if(mysqli_num_rows($res)){
    //         $user = mysqli_fetch_assoc($res);
    //         $rights = $user['rights'];
    //         $_SESSION['user'] = $rights;
    //         $_SESSION['name'] = $user['name'];
    //         $_SESSION['surname'] = $user['surname'];
    //         $rez = 'true';
    //     }
       
        $connect = $this->config->connectingPDO();
        $user = $connect->query($sql)->fetch();
        
        if($user){
            // print_r($user['password']);
            // print_r($user['password']);
            if ($user['password'] == $pass) {
                $rights = $user['rights'];
                $_SESSION['user'] = $rights;
                $_SESSION['name'] = $user['name'];
                $_SESSION['surname'] = $user['surname'];
                return 'Вы успешно авторизовались';
            }else {
                return 'Пароль не верный!';
            }


            $rights = $user['rights'];
            $_SESSION['user'] = $rights;
            $_SESSION['name'] = $user['name'];
            $_SESSION['surname'] = $user['surname'];
            $rez = 'true';
        }else {
            return 'Пользователь с таким логином не зарегистрирован!';
        }

        
    }

    function goout(){
        $_SESSION = [];
    }

    function registr($name, $surname, $login, $pass) {
        
        $connect = $this->config->connect() or die("Error: ".mysqli_error($connect));
        
        $pass = $this -> passv($pass);

        $sql = "INSERT INTO `user` (`id`, `name`, `surname`, `password`, `mail`, `rights`) VALUES (NULL, '$name','$surname','$pass','$login','user')"; 
        $res = mysqli_query($connect,$sql);
        
        if(!$res) {
            die(mysqli_error($connect));
        }
        //return mysqli_fetch_assoc($res);
        return 'true';
    }

}
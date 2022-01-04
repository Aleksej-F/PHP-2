<?
session_start();
//include "./config/config.php";



class M_User {
    private $SERVER = "localhost";
    private $DB = "php2dz5";
    private $LOGIN = "root";
    private $PASS = "";

    function conect() {
     return mysqli_connect($this->SERVER,$this->LOGIN,$this->PASS,$this->DB) or die("Error: ".mysqli_error($connect));
    }

    function passv($pass) {
        $salt = "sldfjsklfdj23lfd0,.sd";
        $pass = $salt.md5($pass).$salt;
        return $pass;
    }
	function auth($login, $pass){
        
        $connect = mysqli_connect($this->SERVER,$this->LOGIN,$this->PASS,$this->DB) or die("Error: ".mysqli_error($connect));

        $rez = 'falze';

        //$config = new Config();
       // $connect = $config->connect();
	   // print_r( '       M_user  '.  'br');
       //  print_r( '       M_user  '.$login. '           '.$pass);
        $pass = $this-> passv($pass);
        $sql = "select * from user where mail='$login' and password='$pass'";
        $res = mysqli_query($connect,$sql) or die("Error: ".mysqli_error($connect));

        if(mysqli_num_rows($res)){
            $user = mysqli_fetch_assoc($res);
           
            $rights = $user['rights'];
                        
            $_SESSION['user'] = $rights;
            $rez = 'true';
        }

        return $rez;
    }

    function goout(){
        $_SESSION = [];
    }

    function registr($name, $surname, $login, $pass) {
        $connect =mysqli_connect($this->SERVER,$this->LOGIN,$this->PASS,$this->DB) or die("Error: ".mysqli_error($connect));
        $pass = $this -> passv($pass);

        $sql = "INSERT INTO `user` (`id`, `name`, `surname`, `password`, `mail`, `rights`) VALUES (NULL, '$name','$surname','$pass','$login','user')"; 
        $res = mysqli_query($connect,$sql);
        //print_r(($res));
        if(!$res) {
            die(mysqli_error($connect));
        }
        //return mysqli_fetch_assoc($res);
    }

}
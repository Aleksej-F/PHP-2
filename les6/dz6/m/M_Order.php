<?
session_start();

class M_Order {
   private $config;
   private $idUser;
   private $connect;
   private $idAdress;

   public function __construct() {
      $this->config = new K_Config();
      $this->connect = $this->config->connectingPDO();
      $this->idUser = $_SESSION['userId']? $_SESSION['userId']:0;
      
   }
   
   //запрос на оформление заказа
   function finishOrder() {
     // $basket = $this->basket();
      $idUser = $this->idUser;
      $city=$_POST['city'];
      $street= $_POST['street'];
      $house= $_POST['house'];
      $flat=$_POST['flat'];

      //print " $idUser  $city  $street $house  $flat";
      //если адрес доставки существет в базе - обновление адреса, иначе добавление адреса
      
      if ($this->getIdDeliveryAddress()){
         $sql = "UPDATE `delivery_address` SET `city` = '$city',`street`='$street', `house`='$house', `flat`=$flat WHERE id_user=$idUser;";
         $this->connect->query($sql);
         // return "адрес обнавлен";
      } else{
         $sql = "INSERT INTO `delivery_address` (`id`, `id_user`, `city`, `street`, `house`, `flat`) VALUES (null, '$idUser', '$city', '$street', '$house', '$flat');";
         $q = $this->connect->query($sql);
         // return "адрес сохранен";
      }
      $address = $this->getIdDeliveryAddress();
      $this->idAdress = $address['id'];
      $orderNumber = ($this->getOrderNumber())? $this->getOrderNumber()['max_order']+1: 1;
      print $orderNumber;
      $this->addOrder($idUser, $orderNumber, $this->idAdress);

   }
   //INSERT INTO `order_information` (`id`, `id_user`, `order_number`, `status`, `delivery_address`) VALUES (NULL, '55', '1', 'rtert', '10'), (NULL, '55', '2', 'erwerwer', '10');
   
   //узнать id адреса доставки пользователя
   function getIdDeliveryAddress() {
      $idUser = $this->idUser;
      $sql = "SELECT id FROM delivery_address WHERE id_user=$idUser;";
      $res = $this->connect->query($sql)->fetch();
      
      //print "   res - ";
     // print_r($res);
      return $res;
   }

   // определить номер последнего заказа пользователя
   function getOrderNumber() {
      $idUser = $this->idUser;
      
      $sql ="SELECT id_user, MAX(order_number) AS 'max_order' FROM order_information WHERE id_user=$idUser GROUP BY id_user;";
      $res = $this->connect->query($sql)->fetch();
      
      print "   res Id order - ";
      print_r($res);
      return $res;
   }
   // добавляем новый заказ
   function addOrder($idUser,$number,$address){
      $sql = "INSERT INTO `order_information` (`id`, `id_user`, `order_number`, `status`, `delivery_address`) VALUES (NULL, $idUser, $number, 'оплачен', $address);";
      $q = $this->connect->query($sql);
      print "   новый заказ добавлен order - ''";
   }
   

}//SELECT order_number, COUNT(*) FROM (SELECT order_number FROM order_information WHERE id_user=55) GROUP BY order_number
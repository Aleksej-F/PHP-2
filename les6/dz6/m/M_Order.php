<?
session_start();

class M_Order {
   private $config;
   private $idUser;
   private $connect;
   private $idAdress;// id адреса доставки
   private $basket;


   public function __construct() {
      $this->config = new K_Config();
      $this->basket = new M_Basket();
      $this->connect = $this->config->connectingPDO();
      $this->idUser = $_SESSION['userId']? $_SESSION['userId']:0;
   }
   
   //запрос на оформление заказа
   function finishOrder() {
      $idUser = $this->idUser;
      
      $basket = $this->basket->basket($idUser);
      
      if (count($basket)==0) {
			return "Корзина пуста. Добавте товары в корзину";
      } 
      $city=$_POST['city'];
      $street= $_POST['street'];
      $house= $_POST['house'];
      $flat=$_POST['flat'];

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
      
      //создаем новый заказ
      $this->addOrder($idUser, $orderNumber, $this->idAdress);
      //получаем id заказа
      $idOrder = $this->getIdOrder($idUser, $orderNumber);
      $id = $idOrder['id'];
      $order = '';
      foreach ($basket as $reviews){
         $id_product=$reviews['id_product'];
         $count=$reviews['count'];
         $order .= "(NULL, $id, $id_product, $count),";
      };
      $order = substr($order,0,-1);
      //добавляем товары заказа в базу
      $this->addPurchases($order);
      //очищаем корзину пользователя
      $this->basket->basketClear($idUser);
      return "Заказ успешно оформлен.";
      
   }
      
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
      return $res;
   }
   // добавляем новый заказ в `order_information`
   function addOrder($idUser,$number,$address){
      $sql = "INSERT INTO `order_information` (`id`, `id_user`, `order_number`, `status`, `delivery_address`) VALUES (NULL, $idUser, $number, 'оплачен', $address);";
      $q = $this->connect->query($sql);
      //print "   новый заказ добавлен order - ''";
   }
   //определить id заказа
   function getIdOrder($idUser,$number) {
      $sql ="SELECT id FROM order_information WHERE id_user=$idUser and order_number=$number;";
      $res = $this->connect->query($sql)->fetch();
      return $res;
   }
   //сохраняем корзину в  purchases
   function addPurchases($order) {
      $sql = "INSERT INTO `purchases` (`id`, `id_order`, `id_product`, `count`) VALUES $order;";
      $q = $this->connect->query($sql);
      //print "   покупки добавлены - ";
   }
   //информация о заказах для админа
   function getStatusOrder() {
      $sql ="SELECT
      order_information.id,
      order_information.order_number,
      order_information.status,
      delivery_address.city,
      delivery_address.street,
      delivery_address.house,
      delivery_address.flat,
      user.name,
      user.surname
      FROM order_information
         LEFT JOIN delivery_address
            ON order_information.delivery_address = delivery_address.id
         LEFT JOIN user
            ON order_information.id_user = user.id
         ORDER BY id";
      $res = $this->connect->query($sql)->fetchAll();
      return $res;
   }

}
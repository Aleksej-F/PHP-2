<?
session_start();
//include_once("config/config.php");



class M_Basket {
   private $config;
   private $idUser;

   public function __construct(){
      $this->config = new K_Config();
      $this->idUser = $_SESSION['userId']? $_SESSION['userId']:0;
   }
   
   //запрос состояний корзины
   function basket($idUser) {
      $sql="SELECT basket.id_product, basket.count, product.description, product.price, product.img, product.title FROM `basket`JOIN `product` ON basket.id_product = product.id WHERE basket.id_user = $idUser;";
      $connect = $this->config->connectingPDO();
      $basket = $connect->query($sql)->fetchAll();
      
      return $basket;
   }

   //запрос на добавление товара в корзину
   function basketAddProduct($id, $idUser) {
      $sql = "select id from basket where id_user=$idUser and id_product=$id;";
      $connect = $this->config->connectingPDO();
      $res = $connect->query($sql)->fetch();
      //print_r($res);
      if(($res)){
         $sql = "UPDATE `basket` SET `count` = count+1 WHERE id_user=$idUser and id_product=$id;";
         $connect->query($sql);
         return "колличество товаров увеличено!";
      }else {
         $sql = "INSERT INTO `basket` (`id`, `id_user`, `id_product`, `count`) VALUES (NULL, '$idUser', '$id', 1)";
         $q = $connect->query($sql);
        /// print_r($q);
        // $q->execute($object);
         if ($q->errorCode() != PDO::ERR_NONE) {
				$info = $q->errorInfo();
				die($info[2]);
			}
         return "товар добавлен в корзину";
      }
   }

   //удаление товара из корзины
   function basketDel($id, $idUser){
      $sql = "DELETE FROM `basket` WHERE id_user=$idUser and id_product=$id";
      $connect = $this->config->connectingPDO();
      $connect->exec($sql);
   }

   // очистка корзины 
   function basketClear($idUser){
      $sql = "DELETE FROM `basket` WHERE `basket`.`id_user` = $idUser";
      $connect = $this->config->connectingPDO();
      $res = $connect->exec($sql);
   }

   // изменение количества товара данного наименования
   function basketCount($idUser,$id,$count){
      $connect = $this->config->connectingPDO();
      if ($count>0){
         $sql = "UPDATE `basket` SET `count` = $count WHERE id_user=$idUser and id_product=$id;";
         $connect->query($sql);
         //echo "колличество товаров изменено!";
      } else {
         $sql = "DELETE FROM `basket` WHERE id_user=$idUser and id_product=$id";
         $res = $connect->exec($sql);
         //$this->config->ConsoleAlert($res);
         return "товар удален из корзины корзину";

      }
   }
}





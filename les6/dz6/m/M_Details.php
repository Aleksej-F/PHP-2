<?
session_start();
include_once("config/config.php");



class M_Details {
    private $config;

   public function __construct(){
      $this->config = new Config();
   }
   
   function product($id) {
     
      $sql="SELECT * FROM `product` WHERE `id`=$id";
      
      $connect = $this->config->connectingPDO();
      $prod = $connect->query($sql)->fetch();
      return $prod;
  }
}
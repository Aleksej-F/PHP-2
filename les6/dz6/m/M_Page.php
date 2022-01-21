<?
session_start();
include_once("config/config.php");



class M_Catalog {
   private $config;

   public function __construct(){
      $this->config = new Config();
   }

   function catalog() {
      $sql = " select * from product";
      $connect = $this->config->connectingPDO();
      $catalog = $connect->query($sql)->fetchAll();
      return $catalog;
   }
}
<?php
class Config{
   private $SERVER = "localhost";
   private $DB = "php2dz5";
   private $LOGIN = "root";
   private $PASS = "";

   public function connect() {
     return mysqli_connect($this->SERVER,$this->LOGIN,$this->PASS,$this->DB) or die("Error: ".mysqli_error($connect));
   }
}
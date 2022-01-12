<?php
class Config{
  private $DRIVER = "mysql";
  private $SERVER = "localhost";
  private $DB = "php2dz5";
  private $LOGIN = "root";
  private $PASS = "";

  public function connect() {
    return mysqli_connect($this->SERVER,$this->LOGIN,$this->PASS,$this->DB);
  }

  public function connectingPDO () {
    return new PDO($this->DRIVER . ':host='. $this->SERVER . ';dbname=' . $this->DB, $this->LOGIN, $this->PASS);
  }
}
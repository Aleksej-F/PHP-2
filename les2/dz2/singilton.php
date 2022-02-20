<?php
class DB
{
    static $object;//объект нашего класса в будущем
    static $connect;

    private function __construct()
    {
//        self::$connect = ...
    }

    use connect;

    function select(){

    }
    function update(){

    }
    function delete($table,$where){

    }
    function insert(){

    }

}

class Test{
    function getGoods(){
        $goods = DB::getObject()->select();
    }
}

trait connect {
   public static function getObject(){
      if(self::$object == null){
          self::$object = new DB();
      }
      return self::$object;

  }
}
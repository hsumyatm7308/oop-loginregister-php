<?php


class Connection{
  public  $dbhost = "localhost";
  public $dbuser = "root";
  public $dbname = "hmmdb";
  public $password = "";


  public function __construct(){
    try {

        $stmt = new PDO("mysql:dbhost=$this->dbhost;dbname=$this->dbname",$this->dbname,$this->password);


    }catch(Exception $e){
        echo "Error Found : ".$e->getMessage();
    }
  }
}



?>
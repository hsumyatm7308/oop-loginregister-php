<?php


class Connection{
  public  $dbhost = "localhost";
  public $dbuser = "root";
  public $dbname = "hmmdb";
  public $password = "";


  public function __construct(){
    try {

        $conn = new PDO("mysql:dbhost=$this->dbhost;dbname=$this->dbname",$this->dbname,$this->password);
        $stmt = $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $stmt->execute();


    }catch(Exception $e){
        echo "Error Found : ".$e->getMessage();
    }
  }
}



?>
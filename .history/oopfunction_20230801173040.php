<?php


class Connection{
  public  $dbhost = "localhost";
  public $dbuser = "root";
  public $dbname = "hmmdb";
  public $password = "";

 
  public $conn;


  public function __construct(){
    try {

        public $conn = new PDO("mysql:dbhost=$this->dbhost;dbname=$this->dbname",$this->dbuser,$this->password);
        public $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        echo "connection successfull";


    }catch(Exception $e){
        echo "Error Found : ".$e->getMessage();
    }
  }
}


$obj=new Connection();

?>

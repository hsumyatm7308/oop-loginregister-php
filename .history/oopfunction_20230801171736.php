<?php


class Connection{
  public  $dbhost = "localhost";
  public $dbuser = "root";
  public $dbname = "hmmdb";
  public $password = "";


  public function __construct(){
    try {

        

    }catch(Exception $e){
        echo "Error Found : ".$e->getMessage();
    }
  }
}



?>
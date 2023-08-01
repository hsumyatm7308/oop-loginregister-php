<?php


class Connection
{
    public $dbhost = "localhost";
    public $dbuser = "root";
    public $dbname = "hmmdb";
    public $password = "";


    public $conn;


    public function __construct()
    {
        try {

            $this->conn = new PDO("mysql:dbhost=$this->dbhost;dbname=$this->dbname", $this->dbuser, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "connection successfull";


        } catch (Exception $e) {
            echo "Error Found : " . $e->getMessage();
        }
    }
}

class Register extends Connection{
    //function to register user in database 
    public function insertUserInfo($fullname,$username,$email,$address,$phone,$password){
       $this->conn->prepare('SELECT * FROM loginregister WHERE username = :username OR email = :email');


    
    }
}

$obj = new Connection();

$reg = new Register();

?>
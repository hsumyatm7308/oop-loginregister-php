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
      $duplicate = $this->conn->prepare('SELECT * FROM loginregister WHERE username = :username OR email = :email');
       
      $row = $duplicate->fetch(PDO::FETCH_ASSOC);
      print_r($row,true);

    
    }


    if (isset($_POST['submit'])) {
        $fullname = textfilter($_POST['fullname']);
        $username = textfilter($_POST["username"]);
        $email = textfilter($_POST["email"]);
        $address = textfilter($_POST["address"]);
        $phone = textfilter($_POST["phone"]);
        $password = textfilter($_POST["password"]);
        $comfirmpass = textfilter($_POST["comfirm"]);
    
        $reg->insertUserInfo($fullname, $username, $email, $address, $phone, $password);
    
    
    }
    
    
    function textfilter($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripcslashes($data);
    
        return $data;
    }
}

$obj = new Connection();

$reg = new Register();
$reg->insertUserInfo($fullname,$username,$email,$address,$phone,$password);

?>
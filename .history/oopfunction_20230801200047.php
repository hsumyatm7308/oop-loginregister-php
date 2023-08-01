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

            // echo "connection successfull";


        } catch (Exception $e) {
            echo "Error Found : " . $e->getMessage();
        }
    }
}
class Register extends Connection
{
    // Function to register user in the database 
    public function insertUserInfo($fullname, $username, $email, $address, $phone, $password, $comfirmpass)
    {
        $duplicate = $this->conn->prepare('SELECT * FROM loginregister WHERE username = :username OR email = :email');
        $duplicate->bindParam(':username', $username, PDO::PARAM_STR);
        $duplicate->bindParam(':email', $email, PDO::PARAM_STR);
        $duplicate->execute();

        $row = $duplicate->rowCount();

        if ($row > 0) {
            return 10;
        } else {
            if ($password == $comfirmpass) {
                try {
                    $stmt = $this->conn->prepare("INSERT INTO loginregister (fullname, username, email, address,phone, password) VALUES (:fullname, :username, :email, :address,:phone, :password)");
                    $stmt->bindParam(':fullname', $fullname);
                    $stmt->bindParam(':username', $username);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':address', $address);
                    $stmt->bindParam(':phone', $phone);
                    $stmt->bindParam(':password', $password);
                    $stmt->execute();


                    return 1;

                } catch (Exception $e) {
                    echo "Error Found: " . $e->getMessage();
                }
            } else {
                return 100;
            }
        }
    }
}

$obj = new Connection();
$reg = new Register();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $fullname = textfilter($_POST['fullname']);
    $username = textfilter($_POST["username"]);
    $email = textfilter($_POST["email"]);
    $address = textfilter($_POST["address"]);
    $phone = textfilter($_POST["phone"]);
    $password = textfilter($_POST["password"]);
    $comfirmpass = textfilter($_POST["comfirm"]);

    $returnresult = $reg->insertUserInfo($fullname, $username, $email, $address, $phone, $password, $comfirmpass);

    if ($returnresult == 10) {
        echo "<div class='alert alert-danger'>Username or email already taken!</div>";
    } elseif ($returnresult == 1) {
        echo "<div class='alert alert-danger'>Successful</div>";
        
    } elseif ($returnresult == 100) {
        echo "<div class='alert alert-danger'>Password doesn't match!</div>";
    }
}

function textfilter($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripcslashes($data);

    return $data;
}

?>
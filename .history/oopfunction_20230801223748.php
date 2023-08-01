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
        try {
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
                        if ($stmt->execute()) {
                            return 1;
                        } else {
                            echo "Try Again";
                        }

                    } catch (Exception $e) {
                        echo "Error Found: " . $e->getMessage();
                    }
                } else {
                    return 100;
                }
            }
        } catch (Exception $e) {
            echo "Error Found: " . $e->getMessage();
        }
    }
}
class Login extends Connection
{
    public $id;

    public function loginUser($username, $password)
    {
        try {
            $stmt = $this->conn->prepare('SELECT id, password FROM loginregister WHERE username = :username');
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $this->id = $user['id'];
                    return 1; // Login successful
                } else {
                    return 10; // Incorrect password
                }
            } else {
                return 100; // User not found
            }
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
}


class Logout extends Connection
{
    public function logoutUser()
    {
        session_start(); // Start the session if not already started
        session_destroy(); // Destroy all data registered to a session
        header("Location: login.php"); // Redirect the user to the login page after logout
        exit(); // Ensure that the script stops executing after the redirection
    }
}


$obj = new Connection();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $reg = new Register();

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
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        header("Location:logout.php");
        exit();
    } elseif ($returnresult == 100) {
        echo "<div class='alert alert-danger'>Password doesn't match!</div>";
    }
}



if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $log = new Login();

    $username = textfilter($_POST["username"]);
    $password = textfilter($_POST["password"]);

    $returnresult = $log->loginUser($username, $password);

    if ($returnresult == 10) {
        echo "<div class='alert alert-danger'>Username and Password don't match</div>";
    } elseif ($returnresult == 1) {
        header("Location: logout.php");
        exit();
    } elseif ($returnresult == 100) {
        header("Location: register.php");
        exit();
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
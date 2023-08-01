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

                // username and email taken
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
                        //   success 
                    } catch (Exception $e) {
                        echo "Error Found: " . $e->getMessage();
                    }
                } else {
                    return 100;
                    // pass and comrifm not match 
                }
            }
        } catch (Exception $e) {
            echo "Error Found: " . $e->getMessage();
        }





    }
}
// class Login extends Connection
// {
//     public $id;

//     public function loginUser($username, $password)
//     {
//         try {
//             $stmt = $this->conn->prepare('SELECT id, password FROM loginregister WHERE username = :username');
//             $stmt->bindParam(':username', $username, PDO::PARAM_STR);
//             $stmt->execute();

//             $row = $stmt->fetch(PDO::FETCH_ASSOC);
//             $col = $stmt->rowCount();


//             if ($col > 0) {
//                 if ($password === $row['password']) {
//                     $this->id = $row['id'];

//                 } else {
//                     return 10;
//                 }
//                 // username and email taken
//             } else {
//                 return 100;
//             }



//         } catch (Exception $e) {
//             die("Error: " . $e->getMessage());
//         }



//     }

//     public function UserId()
//     {
//         return $this->id;
//     }
// }

class Login extends Connection
{
    public $id;

    public function loginUser($username, $password)
    {
        try {
            $stmt = $this->conn->prepare('SELECT id, password FROM loginregister WHERE username = :username');
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $col = $stmt->rowCount();

            if ($col > 0) {
                if (password_verify($password, $row['password'])) {
                    $this->id = $row['id'];
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

    public function getUserID()
    {
        return $this->id;
    }
}


class Logout extends Connection
{
    public function logoutUser()
    {
        session_start();
        session_destroy();
        header("Location: login.php");
        exit();
    }


}


$obj = new Connection();


?>
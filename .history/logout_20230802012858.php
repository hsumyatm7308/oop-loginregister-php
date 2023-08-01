<?php 

require_once "oopfunction.php";

class Logout extends Connection
{
    public function logoutUser()
    {
        $_SESSION = [];
        session_unset();
        session_destroy();
        header("Location:login.php");
        exit();

    }
}


?>


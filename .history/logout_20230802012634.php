<?php 

require_once "oopfunction.php";

class Logout extends Connection
{
    public function logoutUser()
    {
        // session_start();
        // session_destroy();
        // header("Location: login.php");
        // exit();

        $_SESSION = [];
        session_unset();
        session_destroy();
        header("Location:login.php");
        exit();

    }
}


?>


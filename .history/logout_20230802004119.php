<?php 

require_once "oopfunction.php";
$_SESSION = [];
session_unset();
session_destroy();
header("Location:login.php");

?>


<?php
// main script
require 'oopfunction.php';


$logout = new Logout();
$logout->logoutUser();
header("Location:login.php")

?>



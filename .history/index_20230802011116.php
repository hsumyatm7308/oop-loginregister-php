<?php

require 'oopfunction.php';
session_start();

$lout = new Logout();
$lout->logoutUser();


if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    // User is not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>WELCOME</title>
</head>

<body>

    <h1>Welcome Bro!</h1>

    <form method="post" action="logout.php">
        <input type="hidden" name="logout" value="1">
        <button type="submit">Logout</button>
    </form>
</body>

</html>
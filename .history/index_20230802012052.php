<?php

require_once 'logout.php';
session_start();

if (isset($_POST['submit'])) {
    $lout = new Logout();
    $lout->logoutUser();


}


?>

<!DOCTYPE html>
<html>

<head>
    <title>WELCOME</title>
</head>

<body>

    <h1>Welcome Bro!</h1>

    <form method="post" action="login.php">
        <input type="hidden" name="logout" value="1">
        <button type="submit">Logout</button>
    </form>
</body>

</html>
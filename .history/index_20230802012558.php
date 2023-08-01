<?php

require_once 'logout.php';
session_start();

if (isset($_POST['logout'])) {
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

    <form method="post" action="">
        <button type="submit" name="logout">Logout</button>
    </form>
</body>

</html>
<?php

require 'oopfunction.php';

$lout = new Logout();

if(isset($_SESSION['id'])){
    $user = $lout->logoutUser($_SESSION['id']);
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
<?php
// main script
require 'oopfunction.php';

if (isset($_POST['logout'])) {
    $logout = new Logout();
    $logout->logoutUser();
}


?>


<!DOCTYPE html>
<html>

<head>
    <title>Login</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: sans-serif;
            height: 100vh;
            background: #888;

            display: grid;
            place-items: center;
        }
    </style>

</head>

<body class="w-screen h-screen  flex justify-center items-center flex-col">

    <h1 class="mb-10">Successful!</h1>
    <form method="post" action="index.php">
        <input type="hidden" name="logout" value="1">
        <button type="submit">Logout</button>
    </form>

</body>

</html>
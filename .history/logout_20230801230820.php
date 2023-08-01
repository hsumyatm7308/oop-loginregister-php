<?php
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
    <form action="" method="post">
        <button type="button" name="logout" class="border p-3 bg-stone-100 text-xl"> Log out </button>
    </form>

</body>

</html>
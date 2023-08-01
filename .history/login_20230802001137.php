<?php
session_start();
require_once 'oopfunction.php';

$log = new Login();

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $username = textfilter($_POST["username"]);
    $password = textfilter($_POST["password"]);

    $return = $log->loginUser($username, $password);

    if ($return === 10) { // Corrected here
        echo "<div class=''>Username and Password don't match</div>";
    } elseif ($return === 1) { // Corrected here
        header("Location: logout.php");
        exit();
    } elseif ($return === 100) { // Corrected here
        header("Location: register.php");
        exit();
    }
}


function textfilter($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripcslashes($data);

    return $data;
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Login</title>

    <script src="https://cdn.tailwindcss.com"></script>


</head>

<body class="w-screen h-screen  flex justify-center items-center flex-col">

    <div class="w-[450px] h-[600px] bg-stone-100 border flex items-center flex-col">

        <h1 class="text-xl text-black uppercase mt-16">Log in</h1>

        <form action="" method="post" id="form" class="w-full flex justify-center items-center flex-col mt-20">

            <div class="page w-full flex justify-center items-center">
                <input type="text" name="name" class="w-[90%] p-4 mb-2 focus:outline-none" placeholder="username">
            </div>

            <div class="page w-full flex justify-center items-center">
                <input type="password" name="pass" class="w-[90%] p-4 mb-2 focus:outline-none"
                    placeholder="Password">
            </div>





            <div class="w-full flex justify-center items-center">
                <button type="submit" id="next"
                    class="w-full bg-stone-200 text-gray-500 p-3 m-5 hover:opacity-80 hover:text-gray-800">Submit
                </button>
            </div>

        </form>


        <div id="footer" class="w-full flex justify-center items-center flex-col mt-32 hidden">
            <div>
                Don't you have account? <a href="">Register</a>
            </div>
        </div>
    </div>

</body>

</html>
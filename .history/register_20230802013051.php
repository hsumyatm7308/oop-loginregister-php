
<?php
session_start();
require_once 'oopfunction.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $reg = new Register();

        $fullname = textfilter($_POST['fullname']);
        $username = textfilter($_POST["username"]);
        $email = textfilter($_POST["email"]);
        $address = textfilter($_POST["address"]);
        $phone = textfilter($_POST["phone"]);
        $password = textfilter($_POST["password"]);
        $comfirmpass = textfilter($_POST["comfirm"]);

        $returnresult = $reg->insertUserInfo($fullname, $username, $email, $address, $phone, $password, $comfirmpass);

        if ($returnresult === 10) {
            echo "<div class=''>Username or email already taken!</div>";
        } elseif ($returnresult === 1) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            header("Location:index.php");
            exit();
        } elseif ($returnresult === 100) {
            echo "<div class=''>Password doesn't match!</div>";
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
    <style>
      
        body {
            font-family: sans-serif;
            height: 100vh;
            background: #888;

            display: grid;
            place-items: center;
        }

        input.invalid {
            border: 1px dotted red;
        }


        #result-container {
            display: none;

            width: 90%;
        }

        #result-container ul li {
            list-style: none;
            padding: 3px;
        }

        .submit-btn {
            width: 100%;
            background-color: steelblue;
            color: #fff;
            font-size: 20px;
            border: none;

            padding: 5px 0;
            cursor: pointer;
        }
    </style>

</head>

<body class="w-screen h-screen  flex justify-center items-center flex-col">

    <div class="w-[450px] h-[600px] bg-stone-100 border flex items-center flex-col">
        <span id="prev" class="text-gray-500 self-start ml-8 mt-5" onclick="backnow(1)">Back</span>


        <h1 class="text-xl text-black uppercase mt-16">Register</h1>

        <form action="" method="post" id="form" class="w-full flex justify-center items-center flex-col mt-20">
            <div class="page w-full flex justify-center items-center mt-5 hidden">
                <input type="text" name="fullname" class="w-[90%] p-4 mb-2 focus:outline-none" placeholder="Full name">
            </div>
            <div class="page w-full flex justify-center items-center hidden">
                <input type="text" name="username" class="w-[90%] p-4 mb-2 focus:outline-none" placeholder="username">
            </div>
            <div class="page w-full flex justify-center items-center hidden">
                <input type="email" name="email" class="w-[90%] p-4 mb-2 focus:outline-none" placeholder="Email">
            </div>
            <div class="page w-full flex justify-center items-center hidden">
                <input type="text" name="address" class="w-[90%] p-4 mb-2 focus:outline-none" placeholder="Address">
            </div>
            <div class="page w-full flex justify-center items-center hidden">
                <input type="text" name="phone" class="w-[90%] p-4 mb-2 focus:outline-none" placeholder="Phone">
            </div>
            <div class="page w-full flex justify-center items-center hidden">
                <input type="password" name="password" class="w-[90%] p-4 mb-2 focus:outline-none"
                    placeholder="Password">
            </div>
            <div class="page w-full flex justify-center items-center hidden">
                <input type="password" name="comfirm" class="w-[90%] p-4 mb-2 focus:outline-none"
                    placeholder="Comfirm password">
            </div>




            <div class="w-full flex justify-center items-center">
                <button type="button" id="next"
                    class="w-full bg-stone-200 text-gray-500 p-3 m-5 hover:opacity-80 hover:text-gray-800"
                    onclick="gonow(1)">Next </button>
            </div>

        </form>


        <div id="footer" class="w-full flex justify-center items-center flex-col mt-32 hidden">
            <div>
                Have already account? <a href="login.php">Login</a>
            </div>
            <a class="text-blue-500">forget password</a>
        </div>
    </div>

    <script src="./app.js"></script>
</body>

</html>

<!-- CREATE TABLE IF NOT EXISTS loginregister(
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    fullname VARCHAR(255),
    username VARCHAR(255),
    email VARCHAR(255),
    address VARCHAR(255),
    phone VARCHAR(255),
    password  VARCHAR(255)
    ) 
-->
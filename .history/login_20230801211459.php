
<?php
session_start();
require_once 'oopfunction.php';


?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* form .page {
            display: none;
        } */

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
     
            <div class="page w-full flex justify-center items-center hidden">
                <input type="text" name="username" class="w-[90%] p-4 mb-2 focus:outline-none" placeholder="username">
            </div>
            <div class="page w-full flex justify-center items-center hidden">
                <input type="email" name="email" class="w-[90%] p-4 mb-2 focus:outline-none" placeholder="Email">
            </div>
           
            <div class="page w-full flex justify-center items-center hidden">
                <input type="password" name="password" class="w-[90%] p-4 mb-2 focus:outline-none"
                    placeholder="Password">
            </div>
          




            <div class="w-full flex justify-center items-center">
                <button type="button" id="next"
                    class="w-full bg-stone-200 text-gray-500 p-3 m-5 hover:opacity-80 hover:text-gray-800"
                    onclick="gonow(1)">Next </button>
            </div>

        </form>


        <div id="footer" class="w-full flex justify-center items-center flex-col mt-32 hidden">
            <div>
                Don't you have account? <a href="">Register</a>
            </div>
        </div>
    </div>

    <script src="./app.js"></script>
</body>

</html>
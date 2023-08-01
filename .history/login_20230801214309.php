
<?php
session_start();
require_once 'oopfunction.php';


?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>

    <script src="https://cdn.tailwindcss.com"></script>
 

</head>

<body class="w-screen h-screen  flex justify-center items-center flex-col">

    <div class="w-[450px] h-[600px] bg-stone-100 border flex items-center flex-col">
        <span id="prev" class="text-gray-500 self-start ml-8 mt-5" onclick="backnow(1)">Back</span>


        <h1 class="text-xl text-black uppercase mt-16">Log in</h1>

        <form action="" method="post" id="form" class="w-full flex justify-center items-center flex-col mt-20">
     
            <div class="page w-full flex justify-center items-center hidden">
                <input type="text" name="username" class="w-[90%] p-4 mb-2 focus:outline-none" placeholder="username">
            </div>
           
            <div class="page w-full flex justify-center items-center hidden">
                <input type="password" name="password" class="w-[90%] p-4 mb-2 focus:outline-none"
                    placeholder="Password">
            </div>
          




            <div class="w-full flex justify-center items-center">
                <button type="submit" id="next"
                    class="w-full bg-stone-200 text-gray-500 p-3 m-5 hover:opacity-80 hover:text-gray-800">Submit </button>
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
<?php
require_once '../../../App/controllers/BuyerController.php';

// Create an instance of the controller
$controller = new BuyerController();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->authenticate();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Login | Fair Farm</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Roboto+Slab:wght@400;600&display=swap');
        
        body {
            font-family: "Roboto Slab", serif;
        }
        h1, h2 {
            font-family: "Playfair Display", serif;
        }
    </style>
</head>
<body class="bg-cover bg-center min-h-screen flex justify-center items-center px-4" 
      style="background-image: url('./../../Images/bg.jpg');">

    <div class="bg-white shadow-lg rounded-lg flex w-full max-w-4xl overflow-hidden">
        <!-- Left Section  -->
        <div class="w-1/2 p-10 flex flex-col justify-center items-center text-white text-center bg-gradient-to-r from-green-900 to-green-700">
            <h1 class="text-4xl font-bold">Welcome to Fair Farm</h1>
            <p class="mt-5 ">Buy high quality paddy directly from trusted farmers.</p>
            <p class="mt-5 text-sm italic opacity-90">"Connecting farmers and buyers for a fair and transparent marketplace."</p>
        </div>

        <!-- Right Section - Login Form -->
        <div class="w-1/2 p-10">
            <h2 class="text-3xl font-bold mb-6 text-green-700 text-center">Login</h2>
            <form action="CustomerSignin.php" method="POST" class="form-container">
                <div>
                    <input type="text" id="fullname" placeholder="Full Name" name="fullname" class="block w-full p-3 border rounded-lg mb-4 focus:outline-green-600" required>
                </div>
                <div>
                    <input type="email" id="email" name="email" placeholder="Email" class="block w-full p-3 border rounded-lg mb-4 focus:outline-green-600" required>
                </div>
                <div>
                    <input type="password" id="password" name="password" placeholder="Password" class="block w-full p-3 border rounded-lg mb-4 focus:outline-green-600" required>
                </div>
                <div class="text-center pt-6 px-10">
                    <button type="submit" class="w-full bg-green-700 text-white py-3 rounded-lg   hover:bg-green-800 transition">Login</button>
                </div>
            </form>
            
            
            
            
            <!-- <div class="flex justify-between items-center text-sm mb-4">
                <label class="flex items-center">
                    <input type="checkbox" class="mr-2"> Remember me </label>
                <a href="#" class="text-green-700 hover:text-green-800 font-semibold">Forgot password?</a>
            </div> -->
            
            <p class="text-sm text-center mt-5">New to Fair Farm? <a href="http://localhost/FairFarm/app/views/Customer/CustomerSignup.php" class="text-green-700 font-bold hover:text-green-800">Sign Up</a></p>
        </div>
    </div>

</body>
</html>



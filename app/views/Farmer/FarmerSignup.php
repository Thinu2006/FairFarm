<?php
// Include the required controller for handling sign up
require_once '../../../App/controllers/FarmerController.php';

// Create an instance of the controller
$controller = new FarmerController();

// Handle form submission
$controller->createFarmer();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Signup</title>
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
<body class="bg-cover bg-center min-h-screen flex justify-center items-center px-4 py-10" 
      style="background-image: url('./../../Images/f4.jpg');">

    <div class="bg-white shadow-lg rounded-lg flex w-full max-w-3xl overflow-hidden">
        <!-- Left Section - Welcome Message -->
        <div class="w-1/2 p-8 flex flex-col justify-center items-center text-white text-center bg-gradient-to-r from-green-800 to-green-600">
            <h1 class="text-3xl font-bold">Join Fair Farm</h1>
            <p class="mt-4">Sign up now and start selling your high-quality paddy directly to buyers.</p>
            <p class="mt-4 text-sm italic opacity-90">"Connecting farmers and buyers for a fair and transparent marketplace."</p>
        </div>

        <!-- Right Section - Signup Form -->
        <div class="w-1/2 p-10">
            <h2 class="text-3xl font-bold mb-6 text-green-700 text-center">Create Account</h2>
            
            <!-- Two Column Grid Layout -->

            <form action="FarmerSignup.php" method="POST" class="space-y-3">
                <div>
                    <label for="fullname" class="sr-only">FullName</label>
                    <input type="text" id="fullname" name="fullname" placeholder="Full Name" class="block w-full p-2 border rounded-lg focus:outline-green-600" required>
                </div>

                <div>
                    <label for="nic" class="sr-only">NIC</label>
                    <input type="text" id="nic" placeholder="NIC No" name="nic" class="block w-full p-2 border rounded-lg focus:outline-green-600" required>
                </div>

                <div>
                    <label for="contactno" class="sr-only">Contactno</label>
                    <input type="text" id="contactno" placeholder="Contact No" name="contactno" class="block w-full p-2 border rounded-lg focus:outline-green-600" required>
                </div>

                <div>
                    <label for="address" class="sr-only">Address</label>
                    <input type="text" id="address" placeholder="Address" name="address" class="block w-full p-2 border rounded-lg focus:outline-green-600"required>
                </div>

                <div>
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" id="email" placeholder="E-mail" name="email" class="block w-full p-2 border rounded-lg focus:outline-green-600"required>
                </div>

                <div>
                    <label for="password" class="sr-only">Pasword</label>
                    <input type="password" id="password" placeholder="Password" name="password" class="block w-full p-2 border rounded-lg focus:outline-green-600" required >
                </div>

                <div class="flex items-center text-sm mt-4">
                    <input type="checkbox" class="mr-2">
                    <span>I agree to the <a href="./terms&condition.php" class="text-green-700 font-bold hover:text-green-800">terms & conditions</a></span>
                </div>

                <div class="text-center px-10">
                    <button type="submit" class="w-full bg-green-700 text-white py-3 mt-4 rounded-lg  hover:bg-green-800 transition">Sign Up</button>
                </div>
            </form>
            
            <p class="text-sm text-center mt-4">Already have an account? <a href="http://localhost/FairFarm/app/views/Farmer/FarmerSignin.php" class="text-green-700 font-bold hover:text-green-800">Sign In</a></p>
        </div>
    </div>
</body>
</html>
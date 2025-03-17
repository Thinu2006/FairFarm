<?php
// Include the required controller for handling sign up
require_once '../../../App/controllers/BuyerController.php';

// Create an instance of the controller
$controller = new BuyerController();

// Handle form submission
$controller->createBuyer();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Sign</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto+Slab:wght@100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
   
    <style>
    /* Apply Poppins font */
    body {
    font-family: "Roboto Slab", serif !important;
    font-weight: 350;
}


    /* Heading Styles */
    h1 {
        font-size: 32px;
        
    }

    h2 {
        font-size: 30px; /* 32px */
       
    }

    h3 {
        font-size: 28px; /* 28px */
       
    }

    /* Paragraph Styles */
    p {
        font-size: 16px; /* 16px */
       
    }
</style>
</head>
<body class="bg-cover bg-center min-h-screen flex justify-center items-center px-4" 
      style="background-image: url('./../../Images/BuyerLoginBG.jpg');">

    <div class="bg-white shadow-lg rounded-lg flex w-full max-w-4xl overflow-hidden">
        <!-- Left Section - Welcome Message -->
        <div class="w-1/2 p-10 flex flex-col justify-center items-center text-white text-center bg-gradient-to-r from-green-900 to-green-700">
            <h1 class="text-4xl font-bold">Join Fair Farm</h1>
            <p class="mt-5">Sign up now and start buying high quality paddy directly from trusted farmers.</p>
            <p class="mt-5 text-sm italic opacity-90">"Connecting farmers and buyers for a fair and transparent marketplace."</p>
        </div>

        <!-- Right Section - Signup Form -->
        <div class="w-1/2 p-10">
            <h2 class="text-3xl font-bold mb-6 text-green-700 text-center">Create Account</h2>
            
            <!-- Two Column Grid Layout -->

            <form action="CustomerSignup.php" method="POST" class="space-y-3">
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
                    <span>I agree to the <a href="./CustomerTerms&Condition.php" class="text-green-700 font-bold hover:text-green-800">terms & conditions</a></span>
                </div>

                <div class="text-center px-10">
                    <button type="submit" class="w-full bg-green-700 text-white py-3 mt-4 rounded-lg  hover:bg-green-800 transition">Sign Up</button>
                </div>
            </form>
            <p class="text-sm text-center mt-5">Already have an account? <a href="http://localhost/FairFarm/app/views/Customer/CustomerSignin.php" class="text-green-700 font-bold hover:text-green-800">SignIn</a></p>
        </div>
    </div>
</body>
</html>


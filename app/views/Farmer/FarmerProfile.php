<?php
require_once 'C:\xampp\htdocs\FairFarm\vendor\autoload.php'; // Include Composer autoload

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$secretKey = "your_secret_key"; // Same key as in FarmerController

// Check for the token in cookies
if (!isset($_COOKIE['auth_token'])) {
    header("Location: FarmerSignin.php");
    exit;
}

$token = $_COOKIE['auth_token'];

try {
    $decoded = JWT::decode($token, new Key($secretKey, 'HS256'));
    $farmerId = $decoded->farmerId;
    $fullname = $decoded->fullname;
} catch (Exception $e) {
    // Invalid token, redirect to login
    header("Location: FarmerSignin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Profile</title>
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
            font-size: 30px;
            /* 32px */

        }

        h3 {
            font-size: 28px;
            /* 28px */

        }

        /* Paragraph Styles */
        p {
            font-size: 16px;
            /* 16px */

        }
    </style>

</head>

<body class="bg-gray-100 flex">

    <!-- Sidebar Navigation -->
    <?php include './../Layout/FarmerNav.php'; ?>

    <!-- Main Content -->
    <main class="flex-1 ml-64 p-10">
        <!-- Profile Section -->
        <section class="max-w-4xl mx-auto bg-white p-8 shadow-lg rounded-lg">
            <div class="flex items-center gap-6">
                <img src="./../../Images/buyer2.jpg" alt="Farmer" class="w-32 h-32 rounded-full border-4 border-green-700">
                <div>
                    <h1 class="text-3xl font-bold text-green-800">John Doe</h1>
                    <p class="text-gray-600 text-lg">Experienced Paddy Farmer from Anuradhapura</p>
                    <p class="text-gray-700 mt-2"><strong>Contact:</strong> +94 77 123 4567</p>
                    <p class="text-gray-700"><strong>Location:</strong> Anuradhapura, Sri Lanka</p>
                </div>
            </div>
        </section>

        <!-- Farmer’s Listed Products -->
        <section class="max-w-4xl mx-auto mt-6 bg-white p-8 shadow-lg rounded-lg">
            <h2 class="text-2xl font-semibold text-green-800">Listed Paddy Types</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                <!-- Product Card -->
                <div class="bg-white p-5 rounded-xl shadow-lg text-center border border-green-300 hover:shadow-xl transition-all">
                    <img src="./../../Images/paddy1.jpg" alt="Paddy" class="w-full h-40 object-cover rounded-md">
                    <p class="font-bold mt-3 text-lg text-green-800">Keeri Samba</p>
                    <p class="text-gray-700"><strong>Per 1Kg:</strong> Rs. 600</p>
                    <p class="text-gray-700"><strong>Available:</strong> 50kg</p>
                </div>
                <div class="bg-white p-5 rounded-xl shadow-lg text-center border border-green-300 hover:shadow-xl transition-all">
                    <img src="./../../Images/paddy2.jpg" alt="Paddy" class="w-full h-40 object-cover rounded-md">
                    <p class="font-bold mt-3 text-lg text-green-800">Kalu Heenati</p>
                    <p class="text-gray-700"><strong>Per 1Kg:</strong> Rs. 450</p>
                    <p class="text-gray-700"><strong>Available:</strong> 40kg</p>
                </div>
                <div class="bg-white p-5 rounded-xl shadow-lg text-center border border-green-300 hover:shadow-xl transition-all">
                    <img src="./../../Images/paddy3.jpg" alt="Paddy" class="w-full h-40 object-cover rounded-md">
                    <p class="font-bold mt-3 text-lg text-green-800">Suwadel</p>
                    <p class="text-gray-700"><strong>Per 1Kg:</strong> Rs. 300</p>
                    <p class="text-gray-700"><strong>Available:</strong> 30kg</p>
                </div>
            </div>
        </section>
    </main>

</body>

</html>
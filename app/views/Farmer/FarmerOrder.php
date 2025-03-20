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
    <title>Orders</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto+Slab:wght@100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

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
<body class="bg-gray-100 flex">

    <!-- Sidebar Navigation -->
    <?php include './../Layout/FarmerNav.php'; ?>

    <!-- Main Content -->
    <main class="flex-1 ml-64 p-10">
        <div class="max-w-6xl mx-auto p-6 bg-white shadow-lg rounded-xl">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-green-800">Orders</h1>
            </div>

            <!-- Orders Table -->
            <table class="table-auto w-full border-collapse border border-gray-300 text-center">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-400 px-6 py-4">No</th>
                        <th class="border border-gray-400 px-6 py-4">Buyer Name</th>
                        <th class="border border-gray-400 px-6 py-4">Paddy Type</th>
                        <th class="border border-gray-400 px-6 py-4">Quantity (kg)</th>
                        <th class="border border-gray-400 px-6 py-4">Price (Rs)</th>
                        <th class="border border-gray-400 px-6 py-4">Confirmation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white text-center">
                        <td class="border border-gray-400 px-4 py-2">01</td>
                        <td class="border border-gray-400 px-4 py-2">Kamal</td>
                        <td class="border border-gray-400 px-4 py-2">Nadu</td>
                        <td class="border border-gray-400 px-4 py-2">15</td>
                        <td class="border border-gray-400 px-4 py-2">10200.00</td>
                        <td class="border border-gray-400 px-4 py-2 space-y-2">
                            <ion-icon name="checkmark-circle-outline"></ion-icon>
                            <button class="w-1/2 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-800 transition">
                                <i class="fas fa-check-circle mr-2"></i>Approve
                            </button>
                            <button class="w-1/2 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-800 transition">
                                <i class="fas fa-times-circle mr-2"></i>Decline
                            </button>
                        </td>
                    </tr>
                    <tr class="bg-white text-center">
                        <td class="border border-gray-400 px-4 py-2">02</td>
                        <td class="border border-gray-400 px-4 py-2">Amal</td>
                        <td class="border border-gray-400 px-4 py-2">Pachchaperumal</td>
                        <td class="border border-gray-400 px-4 py-2">20</td>
                        <td class="border border-gray-400 px-4 py-2">26578.00</td>
                        <td class="border border-gray-400 px-4 py-2 space-y-2">
                            <button class="w-1/2 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-800 transition">
                                <i class="fas fa-check-circle mr-2"></i>Approve
                            </button>
                            <button class="w-1/2 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-800 transition">
                                <i class="fas fa-times-circle mr-2"></i>Decline
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>

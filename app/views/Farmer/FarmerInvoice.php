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
    <title>Invoice</title>
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
        @media print {
            .no-print { display: none; }
            body { background: white; }
        }
    </style>
</head>
<body class="bg-[#1F4529] flex justify-center items-center min-h-screen p-6">
    
    <div class="bg-white p-8 shadow-lg rounded-lg max-w-3xl w-full border border-gray-300">
        <!-- Invoice Header -->
        <div class="text-center mb-6">
            <h1 class="text-4xl font-bold text-[#1F4529]">Invoice</h1>
            <p class="text-gray-500 text-lg">Order Confirmation & Payment Receipt</p>
        </div>

        <?php
            $buyer = $_GET['buyer'] ?? 'Unknown Buyer';
            $paddy = $_GET['paddy'] ?? 'Unknown Paddy';
            $quantity = $_GET['quantity'] ?? '0';
            $price = $_GET['price'] ?? '0';
            $total_price = number_format($quantity * $price, 2);

            $admin_name = "FairFarm Pvt Ltd";
            $admin_address = "No. 45, Green Street, Colombo, Sri Lanka";
            $admin_contact = "+94 77 123 4567";
        ?>

        <!-- Admin Information -->
        <div class="mb-4 p-4 border-b bg-green-100 rounded-lg">
            <h2 class="text-xl font-semibold text-[#1F4529]">Admin Details:</h2>
            <p class="text-gray-700"><strong><?= $admin_name ?></strong></p>
            <p class="text-gray-700"><?= $admin_address ?></p>
            <p class="text-gray-700"><strong>Contact:</strong> <?= $admin_contact ?></p>
        </div>

        <!-- Buyer Information -->
        <div class="mb-4 p-4 border-b bg-green-100 rounded-lg">
            <h2 class="text-xl font-semibold text-[#1F4529]">Buyer Details:</h2>
            <p class="text-gray-700"><strong>Name:</strong> <?= $buyer ?></p>
        </div>

        <!-- Order Information -->
        <div class="mb-4 p-4 border-b bg-green-100 rounded-lg">
            <h2 class="text-xl font-semibold text-[#1F4529]">Order Details:</h2>
            <p class="text-gray-700"><strong>Paddy Type:</strong> <?= $paddy ?></p>
            <p class="text-gray-700"><strong>Quantity:</strong> <?= $quantity ?> kg</p>
            <p class="text-gray-700"><strong>Price Per Kg:</strong> Rs. <?= number_format($price, 2) ?></p>
            <p class="text-gray-700 font-semibold text-lg"><strong>Total Price:</strong> Rs. <?= $total_price ?></p>
        </div>

        <!-- Order Processing -->
        <div class="mb-6 p-4 border-b bg-green-100 rounded-lg">
            <h2 class="text-xl font-semibold text-[#1F4529]">Order Processing & Payment:</h2>
            <p class="text-gray-700">
                ✅ Your order has been successfully approved.<br>
                ✅ Paddy will be packaged and dispatched within <strong>3-5 business days</strong>.<br>
                ✅ Our team will contact you for further delivery arrangements.<br>
                ✅ Payment should be made <strong>via bank transfer or cash on delivery</strong>.
            </p>
        </div>

        <!-- Print & Back Buttons -->
        <div class="text-center no-print">
            <button onclick="window.print()" class="px-6 py-2 bg-[#1F4529] text-white rounded-lg hover:bg-green-800 transition">
                Print Invoice
            </button>
            <a href="order.php" class="px-6 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-800 transition ml-4">
                Back to Orders
            </a>
        </div>
    </div>
</body>
</html>

<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['Admin_ID'])) {
    header("Location: AdminLogin.php");
    exit;
}

// Include and initialize controllers
require_once '../../controllers/FarmerController.php';
require_once '../../controllers/BuyerController.php';

$farmerController = new FarmerController();
$buyerController = new BuyerController();

// Fetch data
$total_farmers = $farmerController->getFarmerCount();
$total_buyers = $buyerController->getBuyerCount();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <?php include '../Layout/AdminNav.php'; ?>
        
        <!-- Main Content -->
        <div class="flex-1 ml-64 p-10">
            <header class="text-center mb-12">
                <h1 class="text-5xl font-rowdies font-bold text-gray-800 mb-4">Admin Dashboard</h1>
            </header>
            
            <!-- Statistics -->
            <div class="grid grid-cols-3 gap-8 mb-16">
                <?php
                    $orders = 100;
                ?>
                <div class="bg-[#F5EFE6] text-black p-10 text-center rounded shadow border border-gray-300">
                    <p class="text-xl font-OpenSans font-bold">No of Farmers</p>
                    <p class="text-2xl font-bold"></p>
                </div>
                <div class="bg-[#F5EFE6] text-black p-10 text-center rounded shadow border border-gray-300">
                    <p class="text-xl font-OpenSans font-bold">No of Buyers</p>
                    <p class="text-2xl font-bold"></p>
                </div>
                <div class="bg-[#F5EFE6] text-black p-10 text-center rounded shadow border border-gray-300">
                    <p class="text-xl font-OpenSans font-bold">No of Orders</p>
                    <p class="text-2xl font-bold"></p>
                </div>
            </div>

            <!-- Charts -->
            <div class="grid grid-cols-2 gap-8">
                <div class="bg-white p-5 rounded shadow">
                    <h2 class="text-lg font-OpenSans font-bold mb-4 text-center">Top Selling Paddy Types</h2>
                </div>
                <div class="bg-white p-5 rounded shadow">
                    <h2 class="text-lg font-OpenSans font-bold mb-4 text-center">Sales Over the Year</h2>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
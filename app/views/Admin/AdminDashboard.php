<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['Admin_ID'])) {
    header("Location: AdminLogin.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;700&display=swap" rel="stylesheet">
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
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
    <title>Farmer Dashboard</title>
    <!-- Your existing head content -->
</head>
<body class="bg-gray-100 flex">
    <?php include './../Layout/FarmerNav.php'; ?>

    <!-- Main Content -->
    <main class="flex-1 ml-64 p-10">
        <h1 class="text-3xl font-bold text-[#1F4529]">Welcome, <?php echo htmlspecialchars($fullname); ?>!</h1>
        <!-- Your existing dashboard content -->
    </main>
</body>
</html>
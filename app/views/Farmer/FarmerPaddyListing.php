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

require_once '../../controllers/FarmerSellingPaddyController.php';

$controller = new FarmerSellingPaddyController();
$sellingPaddyTypes = $controller->listSellingPaddyTypes($farmerId); // Fetch data for the specific farmer
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paddy Listing</title>
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
        }

        h3 {
            font-size: 28px;
        }

        /* Paragraph Styles */
        p {
            font-size: 16px;
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
                <h1 class="text-3xl font-bold text-green-800">Listed Paddy Types</h1>
                <a href="./FarmerPaddyListingForm.php" class="px-5 py-2 bg-green-700 text-white rounded-lg shadow-md hover:bg-green-900 transition-all">+ List New Type</a>
            </div>

            <!-- Paddy Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
                <?php foreach ($sellingPaddyTypes as $paddy): ?>
                    <!-- Single Paddy Card -->
                    <div class="bg-white p-5 rounded-xl shadow-lg text-center border border-green-300 hover:shadow-xl transition-all">
                        <!-- Paddy Image -->
                        <img src="../../../uploads/<?php echo htmlspecialchars($paddy['Image']); ?>" alt="Paddy" class="w-full h-40 object-cover rounded-md">
                        
                        <!-- Paddy Name -->
                        <p class="font-bold mt-3 text-lg text-green-800"><?php echo htmlspecialchars($paddy['PaddyName']); ?></p>
                        
                        <!-- Price and Quantity -->
                        <p class="text-gray-700"><strong>Per 1Kg:</strong> Rs. <?php echo htmlspecialchars($paddy['Price']); ?></p>
                        <p class="text-gray-700"><strong>Available Quantity:</strong> <?php echo htmlspecialchars($paddy['Quantity']); ?>kg</p>
                        
                        <!-- Buttons for Delete and Update -->
                        <div class="mt-4 flex gap-4 justify-center">
                            <a href="" class="w-1/2 px-4 py-2 bg-green-800 text-white rounded-lg hover:bg-green-700 transition-all">Delete</a>
                            <a href="" class="w-1/2 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-500 transition-all">Update</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
</body>

</html>
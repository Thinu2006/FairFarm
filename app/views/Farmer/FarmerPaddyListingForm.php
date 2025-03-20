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
    // Decode the token to get the FarmerID
    $decoded = JWT::decode($token, new Key($secretKey, 'HS256'));
    $farmerId = $decoded->farmerId; // Retrieve FarmerID from the token
    $fullname = $decoded->fullname;
} catch (Exception $e) {
    // Invalid token, redirect to login
    header("Location: FarmerSignin.php");
    exit;
}

require_once '../../controllers/PaddyController.php';

$paddyController = new PaddyController();
$paddyTypes = $paddyController->index();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List New Paddy Type</title>
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
<body class="bg-gray-100 flex">
    <!-- Sidebar Navigation -->
    <?php include './../Layout/FarmerNav.php'; ?>
    <!-- Main Content -->
    <main class="flex-1 ml-64 p-10">
        <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
            <h1 class="text-2xl font-bold text-center mb-6">List New Paddy Type</h1>
            <form action="../../controllers/FarmerSellingPaddyController.php?action=CreateFarmerSellingPaddyType" method="POST" id="sellingForm">
                <!-- Pass FarmerID as a hidden input -->
                <input type="hidden" name="FarmerID" value="<?php echo $farmerId; ?>">
                
                <!-- Paddy Type Dropdown -->
                <div>
                    <label for="PaddyType" class="block font-bold mb-1">Select Paddy Type:</label>
                    <select name="PaddyTypeID" id="PaddyType" class="w-full p-2 border rounded-lg">
                        <option value="" disabled selected>Select a Paddy Type</option>
                        <?php foreach($paddyTypes as $type): ?>
                            <option value="<?= $type['PaddyID'] ?>" data-max-price="<?= $type['MaxPrice'] ?>" data-image="<?= $type['Image'] ?>" data-name="<?= $type['PaddyName'] ?>"><?= $type['PaddyName'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <!-- Price Slider -->
                <div id="paddyDetails">
                    <label class="block font-bold mb-1">Price Per 1Kg (Rs.)</label>
                    <div class="flex items-center space-x-4">
                        <input type="range" name="PriceSelected" id="PriceSelected" min="0" max="0" value="0" class="w-full cursor-pointer" oninput="updatePriceDisplay()">
                        <span id="selectedPrice" class="px-4 py-2 bg-gray-100 rounded-lg">Select a Paddy Type</span>
                    </div>
                    <img id="paddyImage" src="" alt="Paddy Image" style="max-width: 150px; max-height: 150px; display:none;">
                </div>

                <!-- Quantity Input -->
                <div>
                    <label for="Quantity" class="block font-bold mb-1">Quantity:</label>
                    <input type="number" name="Quantity" id="Quantity" min="1" class="w-full p-2 border rounded-lg" required>
                </div>

                <!-- Buttons -->
                <div class="flex justify-between items-center">
                    <button type="button" onclick="window.history.back()" class="bg-gray-400 text-white py-2 px-6 rounded hover:bg-gray-500 transition">Back</button>
                    <button type="submit" class="bg-green-700 text-white py-2 px-6 rounded hover:bg-green-800 transition">Submit</button>
                </div>
            </form>

            <script>
                // This will update the price slider value and the selected price display
                document.getElementById('PaddyType').addEventListener('change', function() {
                    var selectedOption = this.options[this.selectedIndex];
                    var maxPrice = selectedOption.getAttribute('data-max-price');
                    var imagePath = selectedOption.getAttribute('data-image');
                    var paddyName = selectedOption.getAttribute('data-name');
                    
                    // Update the image
                    var image = document.getElementById('paddyImage');
                    if (imagePath) {
                        image.src = "../../../uploads/" + imagePath;
                        image.style.display = 'block'; // Show the image
                    } else {
                        image.style.display = 'none'; // Hide the image if no image path
                    }

                    // Update the slider max value
                    var priceSlider = document.getElementById('PriceSelected');
                    priceSlider.max = maxPrice;
                    priceSlider.value = maxPrice; // Set the slider to the max price initially

                    // Update the selected price display
                    document.getElementById('selectedPrice').textContent = maxPrice;
                });

                // Update the price display when the slider is moved
                document.getElementById('PriceSelected').addEventListener('input', function() {
                    var selectedPrice = this.value;
                    document.getElementById('selectedPrice').textContent = selectedPrice;
                });

                function updatePriceDisplay() {
                    var priceSlider = document.getElementById('PriceSelected');
                    var selectedPrice = document.getElementById('selectedPrice');
                    selectedPrice.textContent = priceSlider.value;
                }
            </script>
        </div>
    </main>
</body>
</html>
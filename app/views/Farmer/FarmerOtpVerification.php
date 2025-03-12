<?php
require_once '../../../App/controllers/FarmerController.php';

// Create an instance of the controller
$controller = new FarmerController();

// Handle OTP verification
$controller->FarmerVerifyOTP();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-cover bg-center bg-no-repeat bg-black/30">

    <div class="bg-customGray shadow-lg rounded-lg p-12 w-auto h-[400px]">
        <h2 class="text-3xl font-bold mb-6 text-green-700 text-center">OTP Verification</h2>

        <form action="FarmerOtpVerification.php" method="POST" class="form-container">
            <div>
                <label for="otp" class="block text-gray-700 font-bold mb-6 text-xl">Enter OTP:</label>
                <input type="text" name="otp" id="otp" required class="block w-full p-2 border rounded-lg focus:outline-green-600" placeholder="Enter your OTP">
            </div>
            <div class="text-center px-10">
                <button type="submit" class="w-full bg-green-700 text-white py-3 mt-4 rounded-lg  hover:bg-green-800 transition">Verify OTP</button>
            </div>
        </form>
    </div>
</body>
</html>

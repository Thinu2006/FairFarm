<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FairFarm Authentication</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Roboto+Slab:wght@400;600&display=swap');

        body {
            font-family: "Roboto Slab", serif;
        }

        h1 {
            font-family: "Playfair Display", serif;
        }

        /* Fullscreen Video */
        .video-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .video-container video {
            min-width: 100%;
            min-height: 100%;
            object-fit: cover;
        }

        /* Dark overlay for better readability */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }

        /* Content Positioning */
        .content {
            position: relative;
            z-index: 1;
        }
    </style>
</head>
<body class="flex justify-center items-center min-h-screen px-4 text-white">

    <!-- Video Background -->
    <div class="video-container">
        <video autoplay loop muted>
            <source src="./../../app/Images/BGVideo.mp4" type="video/mp4">
        </video>
    </div>

    <!-- Overlay for readability -->
    <div class="overlay"></div>

    <!-- Content Box -->
    <div class="content bg-white shadow-lg rounded-lg p-10 w-full max-w-lg text-center text-gray-900">
        <h1 class="text-4xl font-bold text-green-700 mb-4">Welcome to FairFarm</h1>
        <p class="text-gray-600 mb-6">Join our marketplace and connect directly with buyers and farmers.</p>
        
        <div class="grid grid-cols-2 gap-6">
            <a href="../views/Farmer/FarmerSignup.php" class="block bg-green-700 text-white px-6 py-4 rounded-lg text-xl font-semibold hover:bg-green-800 transition transform hover:scale-105">
                Farmer
            </a>
            
            <a href="../views/Customer/CustomerSignup.php" class="block bg-green-700 text-white px-6 py-4 rounded-lg text-xl font-semibold hover:bg-green-800 transition transform hover:scale-105">
                Buyer
            </a>
        </div>
    </div>

</body>
</html>

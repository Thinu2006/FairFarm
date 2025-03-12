<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Navigation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: "Roboto Slab", serif;
        }
        h1, h2, h3, h4 {
            font-family: "Playfair Display", serif;
        }
    </style>
</head>
<body>


    <!-- Sidebar -->
    <aside class="w-64 bg-[#1F4529] text-white min-h-screen p-5">
        <div class="flex items-center space-x-2 mb-8">
            <img src="./../../Images/logo.png" alt="Logo" class="h-12">
            
        </div>
        <nav class="space-y-4">
            <a href="./../Seller/dashboard.php" class="flex items-center space-x-2 p-3 bg-green-700 rounded-lg hover:bg-green-800">
                <span>🏠</span>
                <span>Dashboard</span>
            </a>
            <a href="./../Seller/paddyListing.php" class="flex items-center space-x-2 p-3 hover:bg-green-800 rounded-lg">
                <span>🌾</span>
                <span>Paddy Listing</span>
            </a>
            <a href="./../Seller/order.php" class="flex items-center space-x-2 p-3 hover:bg-green-800 rounded-lg">
                <span>🚚</span>
                <span>Orders</span>
            </a>
            <a href="./../Seller/profile.php" class="flex items-center space-x-2 p-3 hover:bg-green-800 rounded-lg">
                <span>👤</span>
                <span>Profile</span>
            </a>
            <a href="logout.php" class="flex items-center space-x-2 p-3 hover:bg-red-700 rounded-lg mt-8">
                <span>↩️</span>
                <span>Logout</span>
            </a>
        </nav>
    </aside>
</body>
</html>

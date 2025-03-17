<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Navigation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
   
</head>
<body class="bg-gray-100">

    <!-- Sidebar -->
    <aside class="w-64 min-h-screen bg-[#1F4529] text-white p-8 fixed flex flex-col justify-between">
        
        <!-- Logo -->
        <div>
        <div class="flex items-center space-x-2 mb-8">
            <img src="../../Images/lg1.png" alt="Logo" class="h-14">
        </div>
            
            <!-- Navigation -->
            <nav class="space-y-3">
                <a href="./../Farmer/FarmerDashboard.php" class="flex items-center space-x-3 p-3 bg-white/20 rounded-lg hover:bg-white/30 transition">
                    <i class="fas fa-home text-white"></i>
                    <span class="text-white">Dashboard</span>
                </a>
                <a href="./../Farmer/FarmerPaddyListing.php" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-white/20 transition">
                    <i class="fas fa-seedling"></i>
                    <span>Paddy Listing</span>
                </a>
                <a href="./../Farmer/FarmerOrder.php" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-white/20 transition">
                    <i class="fas fa-truck"></i>
                    <span>Orders</span>
                </a>
                <a href="./../Farmer/FarmerProfile.php" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-white/20 transition">
                    <i class="fas fa-user"></i>
                    <span>Profile</span>
                </a>
                <a href="logout.php" class="flex items-center space-x-3 p-3 text-red-300 hover:bg-red-500 hover:text-white rounded-lg transition mt-6">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </nav>
        </div>

        <!-- User Profile -->
        <div class="flex items-center space-x-3 p-3 bg-white/10 rounded-lg">
            <img src="./../../Images/Buyer2.jpg" alt="User" class="h-10 w-10 rounded-full border border-white">
            <div>
                <p class="text-white font-semibold">Alex Williamson</p>
                <p class="text-white/70 text-sm">#Roku-1974</p>
            </div>
        </div>

    </aside>

</body>
</html>

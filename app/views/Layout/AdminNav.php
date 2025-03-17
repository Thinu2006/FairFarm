<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sidebar Navigation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
   
</head>
<body class="bg-gray-100">
    
    <!-- Sidebar -->
    <aside class="w-64 bg-[#1F4529] text-white min-h-screen p-5 fixed top-0 left-0">

        <div class="flex items-center space-x-2 mb-8">
            <img src="../../Images/lg1.png" alt="Logo" class="h-14">
        </div>
        <nav class="space-y-4">
            <a href="../Admin/AdminDashboard.php" class="flex items-center space-x-2 p-3 hover:bg-green-800 rounded-lg">
                <i class="fas fa-home text-white"></i>
                <span>Dashboard</span>
            </a>
            <a href="../Admin/FarmersList.php" class="flex items-center space-x-2 p-3 hover:bg-green-800 rounded-lg">
                <i class="fas fa-tractor text-white"></i>
                <span>Farmers</span>
            </a>
            <a href="../Admin/CustomersList.php" class="flex items-center space-x-2 p-3 hover:bg-green-800 rounded-lg">
                <i class="fas fa-shopping-cart text-white"></i>
                <span>Customers</span>
            </a>
            <a href="../Admin/ListPaddy.php" class="flex items-center space-x-2 p-3 hover:bg-green-800 rounded-lg">
                <i class="fas fa-seedling text-white"></i>
                <span>Paddy Types</span>
            </a>
            <a href="../Admin/Orderlist.php" class="flex items-center space-x-2 p-3 hover:bg-green-800 rounded-lg">
                <i class="fas fa-box text-white"></i>
                <span>Orders</span>
            </a>
            <a href="/FairFarm/app/controllers/AdminController.php?action=adminlogout" class="flex items-center space-x-2 p-3 hover:bg-red-700 rounded-lg mt-8">
                <i class="fas fa-sign-out-alt text-white"></i>
                <span>Logout</span>
            </a>
        </nav>
    </aside>

   

</body>

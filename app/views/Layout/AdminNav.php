<body class="bg-gray-100">
    
    <!-- Sidebar -->
    <aside class="w-64 bg-[#1F4529] text-white min-h-screen p-5 fixed top-0 left-0">

        <div class="flex items-center space-x-2 mb-8">
            <img src="../../Images/Logo.png" alt="Logo" class="h-14">
        </div>
        <nav class="space-y-4">
            <a href="../Admin/AdminDashboard.php" class="flex items-center space-x-2 p-3 hover:bg-green-800 rounded-lg">
                <span>🏠</span>
                <span>Dashboard</span>
            </a>
            <a href="../Admin/FarmersList.php" class="flex items-center space-x-2 p-3 hover:bg-green-800 rounded-lg">
                <span>🚜</span>
                <span>Farmers</span>
            </a>
            <a href="../Admin/CustomersList.php" class="flex items-center space-x-2 p-3 hover:bg-green-800 rounded-lg">
                <span>🛒</span>
                <span>Customers</span>
            </a>
            <a href="../Admin/ListPaddy.php" class="flex items-center space-x-2 p-3 hover:bg-green-800 rounded-lg">
                <span>🌾</span>
                <span>Paddy Types</span>
            </a>
            <a href="../Admin/Orderlist.php" class="flex items-center space-x-2 p-3 hover:bg-green-800 rounded-lg">
                <span>📦</span>
                <span>Orders</span>
            </a>
            <a href="/FairFarm/app/controllers/AdminController.php?action=adminlogout" class="flex items-center space-x-2 p-3 hover:bg-red-700 rounded-lg mt-8">
                <span>↩️</span>
                <span>Logout</span>
            </a>
        </nav>
    </aside>
</body>
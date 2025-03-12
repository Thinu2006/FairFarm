<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paddy Listing</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-100 flex">
    <!-- Sidebar Navigation -->
    <?php include './../SellerLayout/navigation.php'; ?>
    
    <!-- Main Content -->
    <main class="flex-1 p-8">
        <div class="max-w-6xl mx-auto p-6 bg-white shadow-lg rounded-xl">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-green-800">Listed Paddy Types</h1>
                <a href="./paddyListingForm.php" class="px-5 py-2 bg-green-700 text-white rounded-lg shadow-md hover:bg-green-900 transition-all">+ List New Type</a>
            </div>
            
            <!-- Paddy Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
                <!-- Single Paddy Card -->
                <div class="bg-white p-5 rounded-xl shadow-lg text-center border border-green-300 hover:shadow-xl transition-all">
                    <img src="./../../Images/paddy1.jpg" alt="Paddy" class="w-full h-40 object-cover rounded-md">
                    <p class="font-bold mt-3 text-lg text-green-800">Kiri Samba</p>
                    <p class="text-gray-700"><strong>Per 1Kg:</strong> Rs. 150</p>
                    <p class="text-gray-700"><strong>Available Quantity:</strong> 30kg</p>
                    <div class="mt-4 flex gap-4 justify-center">
                        <a href="#" class="w-1/2 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-800 transition-all">Delete</a>
                        <a href="#" class="w-1/2 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-800 transition-all">Update</a>
                    </div>
                </div>
                
                <div class="bg-white p-5 rounded-xl shadow-lg text-center border border-green-300 hover:shadow-xl transition-all">
                    <img src="./../../Images/paddy2.jpg" alt="Paddy" class="w-full h-40 object-cover rounded-md">
                    <p class="font-bold mt-3 text-lg text-green-800">Basmati</p>
                    <p class="text-gray-700"><strong>Per 1Kg:</strong> Rs. 120</p>
                    <p class="text-gray-700"><strong>Available Quantity:</strong> 50kg</p>
                    <div class="mt-4 flex gap-4 justify-center">
                        <a href="#" class="w-1/2 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-800 transition-all">Delete</a>
                        <a href="#" class="w-1/2 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-800 transition-all">Update</a>
                    </div>
                </div>
                
                <div class="bg-white p-5 rounded-xl shadow-lg text-center border border-green-300 hover:shadow-xl transition-all">
                    <img src="./../../Images/paddy3.jpg" alt="Paddy" class="w-full h-40 object-cover rounded-md">
                    <p class="font-bold mt-3 text-lg text-green-800">Sona Masoori</p>
                    <p class="text-gray-700"><strong>Per 1Kg:</strong> Rs. 100</p>
                    <p class="text-gray-700"><strong>Available Quantity:</strong> 40kg</p>
                    <div class="mt-4 flex gap-4 justify-center">
                        <a href="#" class="w-1/2 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-800 transition-all">Delete</a>
                        <a href="#" class="w-1/2 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-800 transition-all">Update</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>

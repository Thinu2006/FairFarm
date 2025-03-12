<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Profile</title>
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
<body class="bg-green-50 flex">
    
     <!-- Sidebar Navigation -->
     <?php include './../SellerLayout/navigation.php'; ?>
    
    <!-- Main Content -->
    <main class="flex-1 p-8">
        <!-- Profile Section -->
        <section class="max-w-4xl mx-auto bg-white p-8 shadow-lg rounded-lg">
            <div class="flex items-center gap-6">
                <img src="./../../Images/buyer2.jpg" alt="Farmer" class="w-32 h-32 rounded-full border-4 border-green-700">
                <div>
                    <h1 class="text-3xl font-bold text-green-800">John Doe</h1>
                    <p class="text-gray-600 text-lg">Experienced Paddy Farmer from Anuradhapura</p>
                    <p class="text-gray-700 mt-2"><strong>Contact:</strong> +94 77 123 4567</p>
                    <p class="text-gray-700"><strong>Location:</strong> Anuradhapura, Sri Lanka</p>
                </div>
            </div>
        </section>

        <!-- Farmer’s Listed Products -->
        <section class="max-w-4xl mx-auto mt-6 bg-white p-8 shadow-lg rounded-lg">
            <h2 class="text-2xl font-semibold text-green-800">Listed Paddy Types</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                <!-- Product Card -->
                <div class="bg-white p-5 rounded-xl shadow-lg text-center border border-green-300 hover:shadow-xl transition-all">
                    <img src="./../../Images/paddy1.jpg" alt="Paddy" class="w-full h-40 object-cover rounded-md">
                    <p class="font-bold mt-3 text-lg text-green-800">Keeri Samba</p>
                    <p class="text-gray-700"><strong>Per 1Kg:</strong> Rs. 600</p>
                    <p class="text-gray-700"><strong>Available:</strong> 50kg</p>
                </div>
                <div class="bg-white p-5 rounded-xl shadow-lg text-center border border-green-300 hover:shadow-xl transition-all">
                    <img src="./../../Images/paddy2.jpg" alt="Paddy" class="w-full h-40 object-cover rounded-md">
                    <p class="font-bold mt-3 text-lg text-green-800">Kalu Heenati</p>
                    <p class="text-gray-700"><strong>Per 1Kg:</strong> Rs. 450</p>
                    <p class="text-gray-700"><strong>Available:</strong> 40kg</p>
                </div>
                <div class="bg-white p-5 rounded-xl shadow-lg text-center border border-green-300 hover:shadow-xl transition-all">
                    <img src="./../../Images/paddy3.jpg" alt="Paddy" class="w-full h-40 object-cover rounded-md">
                    <p class="font-bold mt-3 text-lg text-green-800">Suwadel</p>
                    <p class="text-gray-700"><strong>Per 1Kg:</strong> Rs. 300</p>
                    <p class="text-gray-700"><strong>Available:</strong> 30kg</p>
                </div>
            </div>
        </section>
    </main>

</body>
</html>

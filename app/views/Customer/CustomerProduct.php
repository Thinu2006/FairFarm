<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Products</title>
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
<body class="bg-green-50">
    <?php include '../Layout/CustomerHeader.php'; ?>
    <!-- Hero Section -->
    <section class="relative w-full h-64 bg-cover bg-center flex items-center justify-center" style="background-image: url('./../../Images/bg.jpg');">
        <div class="absolute inset-0 bg-black bg-opacity-40 flex flex-col items-center justify-center px-6 text-center">
            <h2 class="text-white text-3xl md:text-5xl font-bold">All Paddy Products</h2>
            <form action="search.php" method="GET" class="mt-4">
                <input type="text" name="query" placeholder="Search products..." class="px-4 py-2 rounded-md text-gray-900">
                <button type="submit" class="bg-[#1F4529] text-white px-4 py-2 rounded-md hover:bg-green-800">Search</button>
            </form>
        </div>
    </section>

    <!-- Products Section -->
    <section class="py-16 px-6 bg-green-100">
        <h3 class="text-center text-2xl font-semibold text-[#1F4529]">Our Products</h3>
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php
        
        $products = [
            ["image" => "paddy1.jpg", "name" => "Keeri Samba paddy", "price" => 600, "farmer" => "D.D Bandara", "location" => "Anuradhapura"],
            ["image" => "paddy2.jpg", "name" => "Kalu Heenati paddy", "price" => 450, "farmer" => "B.W Somarathna", "location" => "Anuradhapura"],
            ["image" => "paddy3.jpg", "name" => "Suwadel paddy", "price" => 300, "farmer" => "S.S Bandara", "location" => "Kurunagala"],
            ["image" => "paddy1.jpg", "name" => "Basmati paddy", "price" => 250, "farmer" => "U.D Perera", "location" => "Kurunagala"],
            ["image" => "paddy2.jpg", "name" => "Madathawalu paddy", "price" => 300, "farmer" => "E.D Perera", "location" => "Anuradhapura"],
            ["image" => "paddy3.jpg", "name" => "Kuruluthuda paddy", "price" => 500, "farmer" => "D.D Bandara", "location" => "Anuradhapura"]
        ];
        
        foreach ($products as $index => $product) { 
            echo "<div class='bg-white p-6 rounded-lg shadow-md'>";
            echo "<img src='./../../Images/{$product['image']}' alt='{$product['name']}' class='w-full h-48 object-cover rounded-md'>";
            echo "<h4 class='mt-4 text-lg font-semibold'>{$product['name']}</h4>";
            echo "<p class='text-gray-800 font-bold'>per 1Kg - Rs{$product['price']}</p>";
            echo "<p class='text-gray-600 mt-2'><strong>Farmer details</strong></p>";
            echo "<ul class='text-gray-600 text-sm'>";
            echo "<li>&bull; {$product['farmer']}</li>";
            echo "<li>&bull; From {$product['location']}</li>";
            echo "</ul>";
            echo "<a href='productDetail.php?id=" . ($index + 1) . "' class='mt-4 bg-[#1F4529] text-white px-4 py-2 rounded-md hover:bg-green-800 inline-block'>View</a>"; // ✅ Fixed: Pass ID
            echo "</div>";
        }
        ?>
        
            ?>
        </div>
    </section>

    <!-- Footer -->
    <?php include '../Layout/CustomerFooter.php'; ?>

</body>
</html>
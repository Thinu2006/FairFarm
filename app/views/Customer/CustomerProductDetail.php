<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
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

<?php include '../CustomerLayout/header.php'; ?>

<?php
$products = [
    1 => ["image" => "paddy1.jpg", "name" => "Keeri Samba paddy", "price" => 250, "available" => 15, "farmer" => "S. S. Bandara", "location" => "Kurunegala", "description" => "A highly nutritious and aromatic paddy variety."],
    2 => ["image" => "paddy2.jpg", "name" => "Kalu Heenati paddy", "price" => 450, "available" => 20, "farmer" => "B.W Somarathna", "location" => "Anuradhapura", "description" => "Known for its deep red color and medicinal properties."]
];

$product_id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($product_id > 0 && isset($products[$product_id])) {
    $product = $products[$product_id];
} else {
    echo "<p class='text-center text-red-500 text-lg mt-10'>Product not found.</p>";
    exit;
}
?>

<section class="max-w-5xl mx-auto my-10 p-8 bg-white shadow-lg rounded-lg">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Left Side: Product Image & Details -->
        <div class="md:col-span-2">
            <img src="./../../Images/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="w-full h-64 object-cover rounded-md mb-4">
            
            <!-- Product Details -->
            <div class="space-y-3">
                <h1 class="text-3xl font-bold text-green-800"><?php echo htmlspecialchars($product['name']); ?></h1>
                <p class="text-gray-700 text-lg"><?php echo htmlspecialchars($product['description']); ?></p>
                <p class="text-gray-800 font-bold text-xl">Rs <?php echo number_format($product['price']); ?> / 1Kg</p>
                <p class="text-gray-700"><strong>Available:</strong> <?php echo $product['available']; ?> Kg</p>
                <p class="text-gray-700"><strong>Farmer:</strong> <?php echo htmlspecialchars($product['farmer']); ?></p>
                <p class="text-gray-700"><strong>Location:</strong> <?php echo htmlspecialchars($product['location']); ?></p>
            </div>
        </div>
        
        <!-- Right Side: Request & Chat Section -->
        <div class="bg-gray-100 p-6 rounded-lg flex flex-col items-center justify-between w-full">
            <!-- Request Quantity Section -->
            <div class="w-full">
                <h2 class="text-lg font-semibold text-gray-800 mb-3 text-center">Request Quantity</h2>
                <input type="number" id="quantity" name="quantity" min="1" max="<?php echo $product['available']; ?>" class="w-full border border-gray-400 p-2 rounded-md text-center">
                <button class="mt-4 bg-green-700 text-white px-6 py-2 rounded-md hover:bg-green-900 w-full"><a href="./orderDetail.php">Request</a></button>
            </div>

            <!-- Additional Info -->
            <div class="w-full mt-6 p-4 bg-white shadow-md rounded-md">
                <h3 class="text-lg font-semibold text-gray-800">Farmer Details</h3>
                <p class="text-gray-700"><strong>Name:</strong> <?php echo htmlspecialchars($product['farmer']); ?></p>
                <p class="text-gray-700"><strong>Location:</strong> <?php echo htmlspecialchars($product['location']); ?></p>
            </div>

            <div class="w-full mt-4 p-4 bg-white shadow-md rounded-md">
                <h3 class="text-lg font-semibold text-gray-800">Delivery Estimate</h3>
                <p class="text-gray-700">Estimated delivery time: <strong>3-5 business days</strong></p>
            </div>

            <!-- Chat Section -->
                <button class="mt-2 bg-green-800 text-white px-6 py-2 rounded-md hover:bg-green-800 w-full">Chat</button>
            <!-- Back Button -->
            <a href="product.php" class="mt-4 block bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-700 w-full text-center">Back</a>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include '../CustomerLayout/Footer.php'; ?>



</body>
</html>

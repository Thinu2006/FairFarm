<?php
// Start session to retrieve order details (if needed)
session_start();

// Sample order details (Replace with actual database values)
$order = [
    "buyer_name" => "Kamal",
    "buyer_contact" => "0777547298",
    "delivery_address" => "89/6, Maligawatha Road, Colombo",
    "seller_name" => "Priyal",
    "paddy_type" => "Pachchaperumal Paddy",
    "quantity" => "20kg",
    "amount" => "Rs 10200.00",
    "payment_method" => "Cash on Delivery",
    "status" => "Approved" // Status options: Pending, Approved, Shipped, Delivered
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: "Roboto Slab", serif;
        }
        h1, h2, h3, h4 {
            font-family: "Playfair Display", serif;
        }
        .progress-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            margin-top: 10px;
        }
        .progress-step {
            width: 20px;
            height: 20px;
            background-color: #ccc;
            border-radius: 50%;
        }
        .progress-step.active {
            background-color: #2F6B25;
        }
    </style>
</head>
<body class="bg-green-50">

<?php include '../CustomerLayout/header.php'; ?>

<section class="max-w-4xl mx-auto my-10 p-8 bg-white shadow-lg rounded-lg">
    <h1 class="text-2xl font-bold text-green-800 text-center">My Orders</h1>

    <div class="mt-6 p-4 bg-white shadow-md rounded-md border">
        <h2 class="text-xl font-semibold text-gray-800">Your Order is <span class="text-green-700"><?php echo $order['status']; ?></span></h2>
        
        <!-- Action Buttons -->
        <div class="flex gap-4 mt-4">
            <button class="bg-green-700 text-white px-6 py-2 rounded-md hover:bg-green-900">Cancel Order</button>
            <button class="bg-green-500 text-white px-6 py-2 rounded-md hover:bg-green-700">Received</button>
        </div>
    </div>

    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Buyer Details -->
        <div class="p-4 bg-white shadow-md rounded-md border">
            <h3 class="text-lg font-semibold text-gray-800">Buyer Details</h3>
            <p class="text-gray-700"><strong>Name:</strong> <?php echo $order['buyer_name']; ?></p>
            <p class="text-gray-700"><strong>Contact No:</strong> <?php echo $order['buyer_contact']; ?></p>
            <p class="text-gray-700"><strong>Address:</strong> <?php echo $order['delivery_address']; ?></p>
        </div>
    </div>

    <!-- Order Details -->
    <div class="mt-6 p-4 bg-white shadow-md rounded-md border">
        <h3 class="text-lg font-semibold text-gray-800">Order Details</h3>
        <p class="text-gray-700"><strong>Paddy Type:</strong> <span class="bg-gray-200 px-2 py-1 rounded"><?php echo $order['paddy_type']; ?></span></p>
        <p class="text-gray-700"><strong>Quantity:</strong> <?php echo $order['quantity']; ?></p>
        <p class="text-gray-700"><strong>Amount:</strong> <?php echo $order['amount']; ?></p>
        <p class="text-gray-700"><strong>Payment Method:</strong> <span class="bg-gray-200 px-2 py-1 rounded"><?php echo $order['payment_method']; ?></span></p>
    </div>

    <!-- Tracking History -->
    <div class="mt-6 p-4 bg-white shadow-md rounded-md border">
        <h3 class="text-lg font-semibold text-gray-800">Tracking History</h3>
        <div class="progress-bar">
            <div class="progress-step active"></div>
            <div class="progress-step <?php echo ($order['status'] == 'Approved' || $order['status'] == 'Shipped' || $order['status'] == 'Delivered') ? 'active' : ''; ?>"></div>
            <div class="progress-step <?php echo ($order['status'] == 'Shipped' || $order['status'] == 'Delivered') ? 'active' : ''; ?>"></div>
            <div class="progress-step <?php echo ($order['status'] == 'Delivered') ? 'active' : ''; ?>"></div>
        </div>
        <div class="flex justify-between text-sm text-gray-700 mt-2">
            <span>Pending</span>
            <span>Approved</span>
            <span>Shipped</span>
            <span>Delivered</span>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include '../CustomerLayout/Footer.php'; ?>

</body>
</html>

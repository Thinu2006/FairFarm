<?php
// Start session if needed
session_start();

// Sample order data (Replace with database values)
$orders = [
    ["id" => 1, "paddy_type" => "Pachchaperumal Paddy", "quantity" => "20kg", "amount" => "Rs 10200", "status" => "Approved"],
    ["id" => 2, "paddy_type" => "Keeri Samba", "quantity" => "15kg", "amount" => "Rs 7500", "status" => "Pending"],
    ["id" => 3, "paddy_type" => "Kalu Heenati", "quantity" => "10kg", "amount" => "Rs 4500", "status" => "Shipped"]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto+Slab:wght@100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
   
    <style>
    /* Apply Poppins font */
    body {
    font-family: "Roboto Slab", serif !important;
    font-weight: 350;
}


    /* Heading Styles */
    h1 {
        font-size: 32px;
        
    }

    h2 {
        font-size: 30px; /* 32px */
       
    }

    h3 {
        font-size: 28px; /* 28px */
       
    }

    /* Paragraph Styles */
    p {
        font-size: 16px; /* 16px */
       
    }

        .status-badge {
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: bold;
        }
        .status-approved { background-color: #C6F6D5; color: #2F855A; }
        .status-pending { background-color: #FED7D7; color: #C53030; }
        .status-shipped { background-color: #BEE3F8; color: #2C5282; }
        tr:hover { background-color: #EDF2F7; cursor: pointer; }
    </style>
</head>
<body class="bg-gray-100">

    <?php include '../Layout/CustomerHeader.php'; ?>

    <section class="max-w-5xl mx-auto my-10 p-8 bg-white shadow-lg rounded-lg">
        <h1 class="text-2xl font-bold text-green-800 text-center">My Orders</h1>

        <div class="mt-6 overflow-x-auto">
            <table class="w-full bg-white border-collapse shadow-md rounded-lg">
                <thead class="bg-green-800 text-white">
                    <tr>
                        <th class="p-4 text-left">Paddy Type</th>
                        <th class="p-4 text-left">Quantity</th>
                        <th class="p-4 text-left">Amount</th>
                        <th class="p-4 text-left">Status</th>
                        <th class="p-4 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                    <tr class="border-b hover:bg-gray-100" onclick="window.location.href='orderDetail.php?id=<?php echo $order['id']; ?>'">
                        <td class="p-4"><?php echo htmlspecialchars($order['paddy_type']); ?></td>
                        <td class="p-4"><?php echo htmlspecialchars($order['quantity']); ?></td>
                        <td class="p-4"><?php echo htmlspecialchars($order['amount']); ?></td>
                        <td class="p-4">
                            <span class="status-badge 
                                <?php echo ($order['status'] == 'Approved') ? 'status-approved' : (($order['status'] == 'Pending') ? 'status-pending' : 'status-shipped'); ?>">
                                <?php echo htmlspecialchars($order['status']); ?>
                            </span>
                        </td>
                        <td class="p-4 text-center">
                            <a href="orderDetail.php?id=<?php echo $order['id']; ?>" class="bg-green-700 text-white px-4 py-2 rounded-md hover:bg-green-900">
                                View Details
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
    <!-- Footer -->
    <?php include '../Layout/CustomerFooter.php'; ?>

</body>
</html>

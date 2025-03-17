<?php
// Include the required controller
require_once '../../../App/controllers/BuyerController.php';

// Create an instance of the controller
$controller = new BuyerController();

// Fetch all buyers
$buyers = $controller->index();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
    body {
        font-family: "Roboto Slab", serif !important;
        font-weight: 350;
    }
    </style>
</head>
<body class="bg-gray-100 flex">
    <!-- Sidebar -->
    <?php include '../Layout/AdminNav.php'; ?>

    <!-- Main Content -->
    <main class="flex-1 ml-64 p-10">
        <div class="max-w-6xl mx-auto p-6 bg-white shadow-lg rounded-xl">
            <header class="text-center mb-6">
                <h1 class="text-3xl font-bold text-green-800">Customer List</h1>
            </header>

            <!-- Table to Display Customers -->
            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse border border-gray-300 text-center">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-400 px-6 py-4">ID</th>
                            <th class="border border-gray-400 px-6 py-4">Full Name</th>
                            <th class="border border-gray-400 px-6 py-4">NIC</th>
                            <th class="border border-gray-400 px-6 py-4">Contact No</th>
                            <th class="border border-gray-400 px-6 py-4">Address</th>
                            <th class="border border-gray-400 px-6 py-4">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($buyers)): ?>
                            <?php foreach ($buyers as $buyer): ?>
                                <tr class="bg-white">
                                    <td class="border border-gray-400 px-4 py-2"><?php echo $buyer['BuyerID']; ?></td>
                                    <td class="border border-gray-400 px-4 py-2"><?php echo $buyer['FullName']; ?></td>
                                    <td class="border border-gray-400 px-4 py-2"><?php echo $buyer['NIC']; ?></td>
                                    <td class="border border-gray-400 px-4 py-2"><?php echo $buyer['ContactNo']; ?></td>
                                    <td class="border border-gray-400 px-4 py-2"><?php echo $buyer['Address']; ?></td>
                                    <td class="border border-gray-400 px-4 py-2"><?php echo $buyer['Email']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center border border-gray-400 px-4 py-2">No Data Found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>
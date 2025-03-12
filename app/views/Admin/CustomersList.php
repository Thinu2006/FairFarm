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
    <title>Customer List</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Main Container -->
    <div class="flex">
        <!-- Sidebar -->
        <?php include '../Layout/AdminNav.php'; ?>
        
        <!-- Main Content -->
        <div class="flex-1 ml-64 p-10">
            <header class="text-center mb-6">
                <h1 class="text-5xl font-rowdies font-bold text-gray-800 mb-4">Customer List</h1>
            </header>

            <!-- Table to Display Buyers -->
            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse border border-gray-300 text-center bg-customLightGray mb-20">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-400 px-4 py-4">ID</th>
                            <th class="border border-gray-400 px-4 py-4">Full Name</th>
                            <th class="border border-gray-400 px-4 py-4">NIC</th>
                            <th class="border border-gray-400 px-4 py-4">Contact No</th>
                            <th class="border border-gray-400 px-4 py-4">Address</th>
                            <th class="border border-gray-400 px-4 py-4">Email</th>
                        </tr>
                    </thead>
                    <tbody class="bg-customLightGray">
                        <?php if (!empty($buyers)): ?>
                            <?php foreach ($buyers as $buyer): ?>
                                <tr>
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
    </div>
</body>
</html>

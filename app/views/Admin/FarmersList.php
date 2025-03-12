<?php

// Include the required controller
require_once '../../controllers/FarmerController.php';

// Create an instance of the controller
$controller = new FarmerController();

// Fetch all farmers
$farmers = $controller->index();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmers</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
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
                <h1 class="text-5xl font-rowdies font-bold text-gray-800 mb-4">Farmer Lsit</h1>
            </header>

            <!-- Table to Display Farmers -->
            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse border border-gray-300 text-center bg-white shadow-md rounded-lg">
                    <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-400 px-4 py-4">ID</th>
                                <th class="border border-gray-400 px-4 py-4">Full Name</th>
                                <th class="border border-gray-400 px-4 py-4">NIC</th>
                                <th class="border border-gray-400 px-4 py-4">Contact No</th>
                                <th class="border border-gray-400 px-4 py-4">Address</th>
                                <th class="border border-gray-400 px-4 py-4">Email</th>
                                <th class="border border-gray-400 px-4 py-4">Actions</th>
                            </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($farmers)): ?>
                            <?php foreach ($farmers as $farmer): ?>
                                <tr>
                                    <td class="border border-gray-400 px-4 py-2"><?php echo $farmer['FarmerID']; ?></td>
                                    <td class="border border-gray-400 px-4 py-2"><?php echo $farmer['FullName']; ?></td>
                                    <td class="border border-gray-400 px-4 py-2"><?php echo $farmer['NIC']; ?></td>
                                    <td class="border border-gray-400 px-4 py-2"><?php echo $farmer['ContactNo']; ?></td>
                                    <td class="border border-gray-400 px-4 py-2"><?php echo $farmer['Address']; ?></td>
                                    <td class="border border-gray-400 px-4 py-2"><?php echo $farmer['Email']; ?></td>
                                    <td class="border border-gray-400 px-4 py-2 text-center">
                                        <div class="flex justify-center">
                                            <a href="http://localhost/FairFarm/app/views/Farmer/delete.php?FarmerID=<?php echo $farmer['FarmerID']; ?>" 
                                            class="text-white bg-red-500 hover:bg-red-700 rounded px-4 py-2"
                                            onclick="return confirm('Are you sure you want to delete this?');">
                                                Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center border border-gray-400 px-4 py-2">No Data Found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

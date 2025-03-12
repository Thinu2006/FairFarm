<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Roboto Slab", serif;
        }
        h1, h2, h3, h4 {
            font-family: "Playfair Display", serif;
        }
    </style>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex min-h-screen">
    <!-- Sidebar -->
    <?php include '../Layout/AdminNav.php'; ?>

    <!-- Main Content -->
    <div class="flex-1 p-8 ml-64"> 
        <header class="text-center mb-6">
            <h1 class="text-5xl font-rowdies font-bold text-gray-800 mb-4">List of Orders</h1>
        </header>

        <!-- Table to Display Orders -->
        <div class="overflow-x-auto bg-white shadow-lg rounded-lg p-6">
            <table class="table-auto w-full border-collapse border border-gray-300 text-center">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-400 px-6 py-4">ID</th>
                        <th class="border border-gray-400 px-6 py-4">Paddy Type</th>
                        <th class="border border-gray-400 px-6 py-4">Buyer Name</th>
                        <th class="border border-gray-400 px-6 py-4">Farmer Name</th>
                        <th class="border border-gray-400 px-6 py-4">Quantity (kg)</th>
                        <th class="border border-gray-400 px-6 py-4">Total Price (Rs)</th>
                        <th class="border border-gray-400 px-6 py-4">Status</th>
                        <th class="border border-gray-400 px-6 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($albums)): ?>
                        <?php foreach ($albums as $album): ?>
                            <tr class="bg-white hover:bg-gray-100">
                                <td class="border border-gray-400 px-6 py-3"> <?php echo $album['aid']; ?> </td>
                                <td class="border border-gray-400 px-6 py-3"> <?php echo $album['title']; ?> </td>
                                <td class="border border-gray-400 px-6 py-3"> <?php echo $album['artist']; ?> </td>
                                <td class="border border-gray-400 px-6 py-3"> <?php echo $album['genre']; ?> </td>
                                <td class="border border-gray-400 px-6 py-3"> <?php echo $album['released_year']; ?> </td>
                                <td class="border border-gray-400 px-6 py-3"> <?php echo $album['quantity']; ?> </td>
                                <td class="border border-gray-400 px-6 py-3"> <?php echo $album['price']; ?> </td>
                                <td class="border border-gray-400 px-6 py-3">
                                    <div class="flex justify-center space-x-4">
                                        <a href="delete.php?aid=<?php echo $album['aid']; ?>" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 transition">Delete</a>
                                        <a href="edit.php?aid=<?php echo $album['aid']; ?>" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Edit</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center border border-gray-400 px-6 py-3">No Data Found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

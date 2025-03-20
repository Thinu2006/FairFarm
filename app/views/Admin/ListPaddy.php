<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['Admin_ID'])) {
    header("Location: AdminLogin.php");
    exit;
}

require_once '../../controllers/PaddyController.php';

$controller = new PaddyController();
$paddytypes = $controller->index();  // Fetch all paddy types
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paddy Types</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;700&display=swap" rel="stylesheet">
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
</style>
<!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex h-screen">
    <!-- Sidebar -->
    <?php include '../Layout/AdminNav.php'; ?>

    <!-- Main Content -->
    <main class="flex-1 p-8 overflow-auto ml-64">

        <div class="max-w-6xl mx-auto p-6 bg-white rounded-xl">
            <header class="text-center mb-6">
                <h1 class="text-5xl font-rowdies font-bold text-gray-800 mb-4">List of Paddy Types</h1>
            </header>
            <div class="w-full flex justify-end mb-10">
                <a href="./../Paddy/AddPaddy.php" class="px-5 py-2 bg-green-700 text-white rounded-lg shadow-md hover:bg-green-900 transition-all">+ Add New Type</a>
            </div>
            <!-- Paddy Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
                <?php if (!empty($paddytypes)): ?>
                    <?php foreach ($paddytypes as $paddy): ?>
                        <div class="bg-white p-5 rounded-xl shadow-lg text-center border border-green-700 hover:shadow-xl transition-all">
                            <?php if (!empty($paddy['Image'])): ?>
                                <img src="../../../uploads/<?php echo htmlspecialchars($paddy['Image']); ?>" alt="Paddy Type Image" class="w-full h-40 object-cover rounded-md">
                            <?php else: ?>
                                <p class="text-gray-600">No Image Available</p>
                            <?php endif; ?>
                            <p class="font-bold mt-3 text-lg"><?php echo htmlspecialchars($paddy['PaddyName']); ?></p>
                            <p class="text-gray-700"><strong>Max Price:</strong> Rs. <?php echo htmlspecialchars($paddy['MaxPrice']); ?></p>
                            <div class="mt-4 flex gap-4 justify-center">
                                <a href="http://localhost/FairFarm/app/views/Paddy/EditPaddy.php?PaddyID=<?php echo $paddy['PaddyID']; ?>" class="w-1/2 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-800 transition-all">Edit</a>
                                <a href="http://localhost/FairFarm/app/views/Paddy/DeletePaddy.php?PaddyID=<?php echo $paddy['PaddyID']; ?>" class="w-1/2 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-800 transition-all" onclick="return confirm('Are you sure you want to delete this?');">Delete</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-gray-600 text-center">No paddy types available.</p>
                <?php endif; ?>
            </div>
        </div>
    </main>
</body>
</html>
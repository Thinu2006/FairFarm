<?php
require_once './../../controllers/PaddyController.php';

$controller = new PaddyController();

// Check if PaddyID is set in URL
if (isset($_GET['PaddyID'])) {
    $paddyID = $_GET['PaddyID'];
    $paddy = $controller->getPaddyById($paddyID); 
} else {
    echo "Invalid Request!";
    exit;
}

// Update the paddy type if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->updatePaddyType($paddyID);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Paddy Type</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: url('../../../app/Images/bg.jpg') no-repeat center center/cover;
        }
    </style>
    <script>
        function updatePrice() {
            const max = document.getElementById('Price').value;
            document.getElementById('priceDisplay').textContent = `Rs.${max}`;
        }

        function triggerFileInput() {
            document.getElementById('paddyImage').click();
        }

        function previewImage(event) {
            const image = document.getElementById('imagePreview');
            image.src = URL.createObjectURL(event.target.files[0]);
            image.classList.remove('hidden');
        }
    </script>
</head>
<body class="flex items-center justify-center min-h-screen">
    <div class="max-w-2xl w-full p-10 bg-white bg-opacity-90 border border-gray-300 shadow-2xl rounded-lg">
        <h1 class="text-4xl font-bold text-center mb-8 text-green-800">Edit Paddy Type</h1>
        <form action="" method="post" enctype="multipart/form-data" class="space-y-6">
            <!-- Paddy Name -->
            <div>
                <label class="block text-lg font-bold mb-2">Paddy Name</label>
                <input type="text" name="PaddyName" class="w-full p-2 border rounded bg-gray-100" 
                       value="<?php echo htmlspecialchars($paddy['PaddyName']); ?>" required>
            </div>
            
            <!-- Maximum Price -->
            <div>
                <label class="block text-lg font-bold mb-2">Maximum Price</label>
                <div class="flex justify-between space-x-4 items-center">
                    <span>Rs.0</span>
                    <input type="range" id="Price" name="MaxPrice" max="1000" 
                           value="<?php echo htmlspecialchars($paddy['MaxPrice']); ?>" 
                           oninput="updatePrice()" class="w-full">
                    <span>Rs.1000</span>
                </div>
                <p id="priceDisplay" class="text-center font-bold mt-2">Rs.<?php echo htmlspecialchars($paddy['MaxPrice']); ?></p>
            </div>

            <!-- Image Upload -->
            <div class="mt-6">
                <label class="block text-lg font-bold mb-2">Paddy Image</label>
                <div class="flex flex-col items-center">
                    <img id="imagePreview" class="max-h-60 rounded-lg shadow-md mb-4 <?php echo empty($paddy['Image']) ? 'hidden' : ''; ?>" 
                         src="../../../uploads/<?php echo htmlspecialchars($paddy['Image']); ?>" alt="Current Image">
                    <div class="border-2 border-dashed border-gray-400 rounded-lg p-6 flex flex-col items-center justify-center cursor-pointer hover:bg-gray-100 transition w-full text-center" onclick="triggerFileInput()">
                        <p class="text-gray-500">Click to upload or drag and drop</p>
                    </div>
                </div>
                <input type="file" id="paddyImage" name="Image" class="hidden" accept="image/*" onchange="previewImage(event)">
            </div>
            
            <!-- Buttons -->
            <div class="flex justify-between mt-6">
                <button type="button" onclick="window.history.back()" class="bg-gray-500 text-white py-2 px-6 rounded hover:bg-gray-700 transition">Back</button>
                <button type="submit" class="bg-green-600 text-white py-2 px-6 rounded hover:bg-green-800 transition">Update</button>
            </div>
        </form>
    </div>
</body>
</html>

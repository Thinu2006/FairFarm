<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Paddy Type</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        // Update price range display
        function updatePriceRange() {
            const min = document.getElementById('minPrice').value;
            const max = document.getElementById('maxPrice').value;
            document.getElementById('priceDisplay').textContent = `Rs.${min} - Rs.${max}`;
        }

        // Trigger file input when the upload box is clicked
        function triggerFileInput() {
            document.getElementById('paddyImage').click();
        }

        // Preview the uploaded image
        function previewImage(event) {
            const image = document.getElementById('imagePreview');
            image.src = URL.createObjectURL(event.target.files[0]);
            image.classList.remove('hidden');
        }
    </script>
</head>

<body class="bg-white">

    <!-- Navbar -->
    <?php include '../layout/AdminHeader.php'; ?>

    <!-- Form Container -->
    <div class="max-w-7xl mx-auto p-10 mt-36 border border-gray-900 shadow-lg rounded-lg">
        <h1 class="text-5xl font-bold text-center mb-12 font-rowdies text-gray-800">Add Paddy Type</h1>
        <form action="../controllers/PaddyController.php" method="post" enctype="multipart/form-data" class="space-y-6 flex justify-between">
            
            <!-- Left Column (Paddy Name & Price Range) -->
            <div class="w-1/2 space-y-6 pr-6">
                <!-- Paddy Name -->
                <div class="mb-10">
                    <label class="block text-lg font-bold mb-4">Paddy Name</label>
                    <input type="text" name="paddy_name" class="w-full p-2 border rounded bg-gray-100" required>
                </div>

                <!-- Price Range -->
                <div class="mb-10">
                    <label class="block text-lg font-bold mb-4">Price Range</label>
                    <div class="flex justify-between space-x-2 mb-4">
                        <span>Rs.100</span>
                        <input type="range" id="minPrice" name="min_price" min="0" max="1000" value="100" oninput="updatePriceRange()" class="w-40">
                        <input type="range" id="maxPrice" name="max_price" min="100" max="200" value="200" oninput="updatePriceRange()" class="w-40">
                        <span>Rs.200</span>
                        <p id="priceDisplay" class="text-center font-bold ml-12">Rs.100 - Rs.200</p>
                    </div>
                    
                </div>
            </div>

            <!-- Right Column (Add Image & Preview) -->
            <div class="w-1/2 space-y-6 pl-6">
                <!-- Add Image -->
                <div>
                    <div class="flex space-x-6 justify-center">
                        <!-- Image Preview -->
                        <img id="imagePreview" class="max-h-48 rounded-lg shadow-md hidden w-1/2 object-cover">
                        <!-- Upload Box -->
                        <div class="border-2 border-dashed border-gray-400 rounded-lg p-6 flex flex-col items-center justify-center cursor-pointer hover:bg-gray-100 transition w-1/2"
                             onclick="triggerFileInput()">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-500 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 4v16m8-8H4"/>
                            </svg>
                            <p class="text-gray-500 text-center">Click to upload or drag and drop</p>
                            <input type="file" id="paddyImage" name="paddy_image" accept="image/*" class="hidden" onchange="previewImage(event)">
                        </div>
                    </div>
                    <label class="block text-lg font-bold mb-2 text-center">Add Image</label>
                </div>
            </div>
        </form>

        <!-- Buttons -->
        <div class="flex justify-between mt-16 ">
            <button type="button" onclick="window.history.back()" class="bg-gray-400 text-white py-2 px-6 rounded-full">Back</button>
            <button type="submit" class="bg-gray-400 text-white py-2 px-6 rounded-full">Submit</button>
        </div>
    </div>

</body>
</html>

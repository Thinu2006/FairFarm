<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List New Paddy Type</title>
    
    <script>
        function updatePriceRange() {
            const paddyPriceRanges = {
                "Kiri Samba": { min: 140, max: 160 },
                "Basmati": { min: 120, max: 150 },
                "Sona Masoori": { min: 100, max: 130 }
            };

            const selectedType = document.getElementById("paddy_type").value;
            const priceInput = document.getElementById("price");
            const priceValue = document.getElementById("price_value");

            if (selectedType in paddyPriceRanges) {
                let { min, max } = paddyPriceRanges[selectedType];
                priceInput.min = min;
                priceInput.max = max;
                priceInput.value = min;  
                priceValue.innerText = `Rs. ${min}`;
            } else {
                priceInput.value = 0;
                priceValue.innerText = "Select a Paddy Type";
            }
        }

        function updatePriceDisplay() {
            const priceValue = document.getElementById("price_value");
            const priceInput = document.getElementById("price");
            priceValue.innerText = `Rs. ${priceInput.value}`;
        }
    </script>
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
</style>

</head>
<body class="bg-gray-100  flex">
    <!-- Sidebar Navigation -->
    <?php include './../Layout/FarmerNav.php'; ?>
    
    <!-- Main Content -->
    <main class="flex-1 ml-64 p-10">
        <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
            <h1 class="text-2xl font-bold text-center mb-6">List New Paddy Type</h1>
            
            <form action="save_paddy.php" method="POST" enctype="multipart/form-data" class="space-y-4">
                <div>
                    <label class="block font-bold mb-1">Paddy Type</label>
                    <select name="paddy_type" id="paddy_type" class="w-full p-2 border rounded-lg" required onchange="updatePriceRange()">
                        <option value="" disabled selected>Select a type</option>
                        <option value="Kiri Samba">Kiri Samba</option>
                        <option value="Basmati">Basmati</option>
                        <option value="Sona Masoori">Sona Masoori</option>
                    </select>
                </div>
                
                <div>
                    <label class="block font-bold mb-1">Price Per 1Kg (Rs.)</label>
                    <div class="flex items-center space-x-4">
                        <input type="range" name="price" id="price" min="0" max="0" value="0" class="w-full cursor-pointer" required oninput="updatePriceDisplay()">
                        <span id="price_value" class="px-4 py-2 bg-gray-100 rounded-lg">Select a Paddy Type</span>
                    </div>
                </div>
                
                <div>
                    <label class="block font-bold mb-1">Available Quantity (kg)</label>
                    <input type="number" name="quantity" class="w-full p-2 border rounded-lg" required>
                </div>
                
                <div>
                    <label class="block font-bold mb-1">Upload Image</label>
                    <input type="file" name="image" class="w-full p-2 border rounded-lg" accept="image/*" required>
                </div>
                
                <div class="flex justify-end">
                    <button type="submit" class="px-6 py-2 bg-green-700 text-white rounded-lg hover:bg-green-800">Submit</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>

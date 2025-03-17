<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Dashboard</title>
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
    <?php include './../Layout/FarmerNav.php'; ?>

    <!-- Main Content -->
    <main class="flex-1 ml-64 p-10">
        <h1 class="text-3xl font-bold text-[#1F4529]">Welcome, John Deo! </h1>

        <!-- Stats Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            <div class="bg-white text-center p-6 rounded-lg shadow-md">
                <p class="text-lg font-semibold">Total Orders</p>
                <p class="text-3xl font-bold mt-2 text-[#1F4529]">10</p>
            </div>
            <div class="bg-white  text-center p-6 rounded-lg shadow-md">
                <p class="text-lg font-semibold">Total Revenue (Rs)</p>
                <p class="text-3xl font-bold mt-2 text-[#1F4529]">100,000</p>
            </div>
            <div class="bg-white  text-center p-6 rounded-lg shadow-md">
                <p class="text-lg font-semibold">Active Products</p>
                <p class="text-3xl font-bold mt-2 text-[#1F4529]">5</p>
            </div>
        </div>

        <!-- Sales Chart UI -->
        <div class="bg-white  p-6 rounded-lg shadow-md mt-6">
            <h3 class="text-xl font-semibold text-center text-[#1F4529] mb-4">Sales Over the Year</h3>

            <!-- Chart Container -->
            <div class="relative w-full h-40 flex flex-col justify-end border-l-2 border-b-2 border-gray-600 p-4">
                <div class="absolute left-0 top-0 h-full w-full flex flex-col justify-between">
                    <div class="border-t border-gray-400 w-full"></div>
                    <div class="border-t border-gray-400 w-full"></div>
                    <div class="border-t border-gray-400 w-full"></div>
                </div>

                <div class="absolute bottom-0 left-0 w-full flex justify-around items-end">
                    <div class="flex flex-col items-center">
                        <div class="bg-[#1F4529] w-3 h-6 rounded-md"></div>
                        <p class="mt-1 text-sm">Jan</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="bg-[#1F4529] w-3 h-12 rounded-md"></div>
                        <p class="mt-1 text-sm">Feb</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="bg-[#1F4529] w-3 h-16 rounded-md"></div>
                        <p class="mt-1 text-sm">Mar</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="bg-[#1F4529] w-3 h-8 rounded-md"></div>
                        <p class="mt-1 text-sm">Apr</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="bg-[#1F4529] w-3 h-20 rounded-md"></div>
                        <p class="mt-1 text-sm">May</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>

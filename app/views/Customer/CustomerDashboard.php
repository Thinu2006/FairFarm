<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agriculture Website</title>
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
</style>

   
</head>
<body class="bg-gray-100">
     <!-- Navbar -->
     <?php include '../Layout/CustomerHeader.php'; ?>
     
    <!-- Hero Section -->
<section class="relative w-full min-h-screen bg-cover bg-center flex items-center justify-center" style="background-image: url('./../../Images/HomepgBG.jpg');">
    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center px-6 text-center">
        <h2 class="text-white text-3xl md:text-5xl font-bold">Sri Lanka Has Long History Of Agriculture</h2>
    </div>
</section>

    <!-- About Section -->
    <section class="py-16 px-6 flex flex-col md:flex-row items-center">
        <img src="./../../Images/IMG4.jpg" alt="Paddy" class="w-full md:w-1/3 rounded-lg shadow-md">
        <div class="md:ml-10 mt-6 md:mt-0">
        <h3 class="text-[#1F4529] text-3xl font-semibold">Paddy Of Sri Lanka</h3>
            <p class="text-gray-800 mt-5 ">Sri Lanka has a deep-rooted history in agriculture, particularly in paddy cultivation. The country's fertile lands and traditional farming techniques have resulted in some of the finest rice varieties in the world. From ancient irrigation systems to modern sustainable practices, paddy farming continues to be a key aspect of Sri Lanka’s economy and culture.</p>
            <p class="text-gray-800 mt-2 ">Farmers across the island dedicate their lives to producing high-quality rice that meets both local and international demands. The diversity of paddy types, including organic and heirloom varieties, showcases the rich agricultural heritage of the nation.</p>
            <button class="mt-4 bg-[#1F4529] text-white px-4 py-2 rounded-md hover:bg-green-800">Read More</button>

        </div>
    </section>
    
        <!-- Products Section -->
        <section class="py-16 px-6 ">
        <h3 class="text-center text-2xl font-semibold text-[#1F4529]">Products</h3>
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <img src="./../../Images/paddy1.jpg" alt="Keeri Samba Paddy" class="w-full h-48 object-cover rounded-md">
                <h4 class="mt-4 text-lg font-semibold">Keeri Samba paddy</h4>
                <p class="text-gray-800 font-bold">per 1Kg - Rs600</p>
                <p class="text-gray-600 mt-2"><strong>Farmer details</strong></p>
                <ul class="text-gray-600 text-sm">
                    <li>&bull; D.D Bandara</li>
                    <li>&bull; From Anuradhapura</li>
                </ul>
                <button class="mt-4 bg-[#1F4529] text-white px-4 py-2 rounded-md hover:bg-green-800">Read More</button>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <img src="./../../Images/paddy2.jpg" alt="Kalu Heenati Paddy" class="w-full h-48 object-cover rounded-md">
                <h4 class="mt-4 text-lg font-semibold">Kalu Heenati paddy</h4>
                <p class="text-gray-800 font-bold">per 1Kg - Rs450</p>
                <p class="text-gray-600 mt-2"><strong>Farmer details</strong></p>
                <ul class="text-gray-600 text-sm">
                    <li>&bull; B.W Somarathna</li>
                    <li>&bull; From Anuradhapura</li>
                </ul>
                <button class="mt-4 bg-[#1F4529] text-white px-4 py-2 rounded-md hover:bg-green-800">Read More</button>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <img src="./../../Images/paddy3.jpg" alt="Suwadel Paddy" class="w-full h-48 object-cover rounded-md">
                <h4 class="mt-4 text-lg font-semibold">Suwadel paddy</h4>
                <p class="text-gray-800 font-bold">per 1Kg - Rs300</p>
                <p class="text-gray-600 mt-2"><strong>Farmer details</strong></p>
                <ul class="text-gray-600 text-sm">
                    <li>&bull; S.S Bandara</li>
                    <li>&bull; From Kurunagala</li>
                </ul>
                <button class="mt-4 bg-[#1F4529] text-white px-4 py-2 rounded-md hover:bg-green-800">Read More</button>
            </div>
             
        </div>
        <div class="mt-8 text-center">
    <a href="./product.php" class="bg-[#1F4529] text-white px-6 py-3 rounded-md hover:bg-green-800">
        More Products
    </a>
</div>

    </section>

    
   <!-- Quality and Pricing Section -->
<section class="relative w-full h-64 bg-cover bg-center bg-no-repeat" style="background-image: url('./../../Images/paddy4.jpg');">
    <div class="bg-black bg-opacity-50 h-full flex items-center">
        <div class="flex justify-around max-w-4xl mx-auto w-full text-white text-center">
            <div>
                <h4 class="text-2xl font-semibold">100+</h4>
                <p>High Quality</p>
            </div>
            <div>
                <h4 class="text-2xl font-semibold">100+</h4>
                <p>Fair Prices</p>
            </div>
            <div>
                <h4 class="text-2xl font-semibold">40+</h4>
                <p>Island Farmers</p>
            </div>
        </div>
    </div>
</section>


    
    <!-- Testimonials Section -->
    <section class="py-16 px-6">
        <h3 class="text-center text-2xl font-semibold text-[#1F4529]">What Our Buyers Say</h3>
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <img src="./../../Images/buyer1.jpg" alt="Nimal Perera" class="w-16 h-16 rounded-full mx-auto">
                <h4 class="mt-4 text-lg font-semibold">Nimal Perera</h4>
                <p class="text-gray-600 mt-2">The rice was of excellent quality, delivered in good quantity, and priced fairly. Truly worth it.</p>
                <div class="mt-4 text-yellow-500">★★★★★</div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <img src="./../../Images/buyer2.jpg" alt="Ranoweera" class="w-16 h-16 rounded-full mx-auto">
                <h4 class="mt-4 text-lg font-semibold">Ranoweera</h4>
                <p class="text-gray-600 mt-2">Great value for money with high-quality rice, ample quantity, and a very reasonable price.</p>
                <div class="mt-4 text-yellow-500">★★★★★</div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <img src="./../../Images/buyer3.jpg" alt="Nelum Perera" class="w-16 h-16 rounded-full mx-auto">
                <h4 class="mt-4 text-lg font-semibold">Nelum Perera</h4>
                <p class="text-gray-600 mt-2">The rice met all expectations with superb quality, a fair price, and sufficient quantity.</p>
                <div class="mt-4 text-yellow-500">★★★★★</div>
            </div>
        </div>
    </section>
    
    <!--Footer  -->
<?php include '../Layout/CustomerFooter.php'; ?>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Font (Playfair Display) -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&display=swap" rel="stylesheet">

    <!-- FontAwesome Icons (Fixed) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        body {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>
<body class="bg-gray-900">

    <!-- Footer -->
    <footer class="bg-[#123D1E] text-white py-12 px-6">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center text-center md:text-left">

            <!-- Middle Section: Description -->
            <div class="md:w-1/2 mt-6 md:mt-0 text-center">
                <p class="text-gray-300 max-w-lg mx-auto leading-relaxed">
                    We provide Sri Lanka’s finest quality long-grain rice, including premium varieties and 
                    traditional rice, at reasonable rates, processed using the latest rice milling technology.
                </p>

                <!-- Social Media Icons -->
                <div class="mt-4 flex justify-center space-x-4">
                    <a href="#" class="text-gray-300 hover:text-white transition">
                        <i class="fa-brands fa-facebook text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white transition">
                        <i class="fa-brands fa-instagram text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white transition">
                        <i class="fa-brands fa-twitter text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white transition">
                        <i class="fa-brands fa-linkedin text-xl"></i>
                    </a>
                </div>
            </div>

        </div>

        <!-- Bottom Border Line -->
        <div class="border-t border-gray-500 mt-8"></div>

        <!-- Copyright -->
        <div class="text-center text-gray-400 text-sm mt-4">
            © 2025 Fair Farm. All rights reserved.
        </div>
    </footer>

</body>
</html>

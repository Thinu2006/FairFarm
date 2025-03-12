<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('./../../Images/bg.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-800 bg-opacity-50">
    <div class="max-w-2xl w-full bg-white p-8 shadow-lg rounded-lg">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Contact Us</h1>
        <p class="text-center text-gray-600 mb-6">We’d love to hear from you! Send us a message.</p>
        
        <form action="#" method="post" class="space-y-4">
            <div>
                <label class="block text-gray-700 font-semibold">Your Name</label>
                <input type="text" name="name" class="w-full p-3 border rounded-lg bg-gray-100" required>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold">Email Address</label>
                <input type="email" name="email" class="w-full p-3 border rounded-lg bg-gray-100" required>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold">Your Message</label>
                <textarea name="message" rows="4" class="w-full p-3 border rounded-lg bg-gray-100" required></textarea>
            </div>
            <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg shadow-md hover:bg-green-800 transition-all">
                Send Message
            </button>
        </form>
    </div>
</body>
</html>

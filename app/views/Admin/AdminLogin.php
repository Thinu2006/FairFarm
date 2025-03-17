<?php
require_once '../../../app/controllers/AdminController.php';

$controller = new AdminController();

$controller->authenticateAdmin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Fair Farm</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
</head>
<body class="bg-cover bg-center min-h-screen flex justify-center items-center px-4" 
      style="background-image: url('./../../Images/admin.jpg');">

    <div class="bg-white shadow-lg rounded-lg flex w-full max-w-2xl overflow-hidden">
        <!-- Left Section  -->
        <div class="w-1/2 p-10 flex flex-col justify-center items-center text-white text-center bg-gradient-to-r from-gray-900 to-gray-700">
            <h1 class="text-4xl font-bold">Admin Portal</h1>
            <p class="mt-5 ">Manage Fair Farm efficiently and securely.</p>
            <p class="mt-5 text-sm italic opacity-90">"Ensuring a seamless marketplace for farmers and buyers."</p>
        </div>

        <!-- Right Section - Login Form -->
        <div class="w-1/2 p-10">
            <h2 class="text-3xl font-bold mb-6 text-gray-700 text-center">Login</h2>
            <form action="AdminLogin.php" method="POST" class="form-container mt-8">
                <div class="mb-">
                    <input type="text" id="username" name="username" placeholder="Username" class="block w-full p-3 border rounded-lg mb-4 focus:outline-gray-600" required>
                </div>
                <div class="mb-">
                    <input type="password" id="password" name="password" placeholder="Password" class="block w-full p-3 border rounded-lg mb-4 focus:outline-gray-600" required>
                </div>
               <div class="text-center pt-6 px-10">
                    <button type="submit" class="w-full bg-gray-700 text-white py-3 rounded-lg hover:bg-gray-800 transition">Sign In</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex">

    <!-- Sidebar Navigation -->
    <?php include './../SellerLayout/navigation.php'; ?>

    <!-- Main Content -->
    <main class="flex-1 p-8">
        <div class="max-w-6xl mx-auto p-6 bg-white shadow-lg rounded-xl">
        <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-green-800">Orders</h1>
               
            </div>

            <!-- Orders Table -->
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-400 text-white">
                        <th class="border border-gray-300 px-4 py-2">No</th>
                        <th class="border border-gray-300 px-4 py-2">Buyer Name</th>
                        <th class="border border-gray-300 px-4 py-2">Paddy Type</th>
                        <th class="border border-gray-300 px-4 py-2">Quantity (kg)</th>
                        <th class="border border-gray-300 px-4 py-2">Price (Rs)</th>
                        <th class="border border-gray-300 px-4 py-2">Confirmation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white text-center">
                        <td class="border border-gray-300 px-4 py-2">01</td>
                        <td class="border border-gray-300 px-4 py-2">Kamal</td>
                        <td class="border border-gray-300 px-4 py-2">Nadu</td>
                        <td class="border border-gray-300 px-4 py-2">15</td>
                        <td class="border border-gray-300 px-4 py-2">10200.00</td>
                        <td class="border border-gray-300 px-4 py-2 space-y-2">
                        <a href="invoice.php?buyer=Kamal&paddy=Nadu&quantity=15&price=10200" 
   class="w-full px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-700 transition block text-center">
   Approve
</a>

                            <button class="w-full px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-700 transition">Decline</button>
                        </td>
                    </tr>
                    <tr class="bg-white text-center">
                        <td class="border border-gray-300 px-4 py-2">02</td>
                        <td class="border border-gray-300 px-4 py-2">Amal</td>
                        <td class="border border-gray-300 px-4 py-2">Pachchaperumal</td>
                        <td class="border border-gray-300 px-4 py-2">20</td>
                        <td class="border border-gray-300 px-4 py-2">26578.00</td>
                        <td class="border border-gray-300 px-4 py-2 space-y-2">
                            <button class="w-full px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-700 transition">Approve</button>
                            <button class="w-full px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-700 transition">Decline</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>

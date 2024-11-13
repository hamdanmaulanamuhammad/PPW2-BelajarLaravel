<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum Pemrograman Web2</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">
    <div class="bg-white rounded-lg shadow-lg max-w-lg w-full">
        <!-- Header Section -->
        <div class="bg-blue-600 text-white text-center py-4 rounded-t-lg">
            <h2 class="text-2xl font-bold">Hello Email</h2>
        </div>

        <!-- Content Section -->
        <div class="p-6">
            <p class="text-lg font-semibold text-gray-800 mb-1">Halo, {{ $data['name'] }}</p>
            
            <!-- Message Body -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                <p class="text-gray-700">{{ $data['body'] }}</p>
            </div>
        </div>

        <!-- Footer Section -->
        <div class="bg-blue-600 text-white text-center py-4 rounded-b-lg">
            <p>Terima kasih</p>
        </div>
    </div>
</body>
</html>

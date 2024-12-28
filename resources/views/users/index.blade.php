<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List - Laravel Application</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-2 flex justify-between items-center">
            <a href="/" class="text-xl font-bold text-gray-800">Laravel Asynchronous SQL ZeroMQ Queries</a>
            <div class="flex space-x-4">
                <a href="/" class="text-gray-600 hover:text-gray-800">Home</a>
                <a href="/users" class="text-gray-600 hover:text-gray-800">Users</a>
                <a href="/products" class="text-gray-600 hover:text-gray-800">Products</a>
            </div>
        </div>
    </nav>
    <div class="bg-gray-100 min-h-screen">
        <div class="container mx-auto p-8">
            <h1 class="text-4xl font-extrabold mb-8 text-center text-gray-800">Users List</h1>
            <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($users as $user)
                    <li class="p-6 bg-white shadow-lg rounded-lg hover:shadow-xl transition-shadow duration-300">
                        <div class="text-xl font-bold text-gray-900">{{ $user->name }}</div>
                        <div class="text-gray-500">{{ $user->email }}</div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List - Laravel Application</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-2 flex justify-between items-center">
            <a href="/" class="text-xl font-bold text-gray-800">Laravel App</a>
            <div class="flex space-x-4">
                <a href="/" class="text-gray-600 hover:text-gray-800">Home</a>
                <a href="/users" class="text-gray-600 hover:text-gray-800">Users</a>
                <a href="/products" class="text-gray-600 hover:text-gray-800">Products</a>
            </div>
        </div>
    </nav>
    <div class="bg-gray-100 min-h-screen">
        <div class="container mx-auto p-8">
            <h1 class="text-3xl font-bold mb-6">Users List</h1>
            <ul class="space-y-4">
                @foreach($users as $user)
                    <li class="p-4 bg-white shadow rounded-lg">
                        <div class="text-lg font-semibold">{{ $user->name }}</div>
                        <div class="text-gray-600">{{ $user->email }}</div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>

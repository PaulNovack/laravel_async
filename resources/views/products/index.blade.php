<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-md sticky top-0 z-50">
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
        <h1 class="text-3xl font-bold mb-6 text-center">Products List</h1>
        <div class="table-users">
            <div class="header bg-gradient-to-r from-blue-400 to-gray-400 text-white text-lg font-bold py-4 px-6 rounded-t-lg">Products</div>
            <table class="min-w-full bg-white shadow-lg rounded-b-lg overflow-hidden">
                <thead class="bg-gradient-to-r from-gray-400 to-blue-400 text-white">
                    <tr>
                        <th class="py-3 px-6 text-left text-sm font-medium">Name</th>
                        <th class="py-3 px-6 text-left text-sm font-medium">Description</th>
                        <th class="py-3 px-6 text-left text-sm font-medium">Price</th>
                        <th class="py-3 px-6 text-left text-sm font-medium">Quantity</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach($products as $product)
                        <tr class="border-b border-gray-200 hover:bg-blue-50 odd:bg-gray-50 even:bg-white">
                            <td class="py-3 px-6">{{ $product->name }}</td>
                            <td class="py-3 px-6">{{ $product->description }}</td>
                            <td class="py-3 px-6 text-green-600 font-semibold">${{ number_format($product->price, 2) }}</td>
                            <td class="py-3 px-6 text-center">{{ $product->quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $products->links() }}
            </div>
            </table>
        </div>
    </div>
</body>
</html>

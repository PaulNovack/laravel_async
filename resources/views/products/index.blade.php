<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List</title>
    <link href="{{ asset('build/assets/app-B_EfxRPF.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Products List</h1>
        <div class="table-users">
            <div class="header bg-gradient-to-r from-teal-500 to-blue-500 text-white text-lg font-bold py-4 px-6 rounded-t-lg">Products</div>
            <table class="min-w-full bg-white shadow-md rounded-b-lg overflow-hidden">
                <thead class="bg-gradient-to-r from-blue-500 to-teal-500 text-white">
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
        </div>
    </div>
</body>
</html>

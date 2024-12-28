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
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Name</th>
                    <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Description</th>
                    <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Price</th>
                    <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Quantity</th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach($products as $product)
                    <tr class="border-b border-gray-200 hover:bg-gray-100 odd:bg-gray-100 even:bg-white">
                        <td class="py-3 px-6">{{ $product->name }}</td>
                        <td class="py-3 px-6">{{ $product->description }}</td>
                        <td class="py-3 px-6">${{ number_format($product->price, 2) }}</td>
                        <td class="py-3 px-6">{{ $product->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>

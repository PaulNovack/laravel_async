<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Products List</h1>
        <ul>
            @foreach($products as $product)
                <li class="mb-2">{{ $product->name }} - ${{ $product->price }}</li>
            @endforeach
        </ul>
    </div>
</body>
</html>

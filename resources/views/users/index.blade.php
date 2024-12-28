<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Users List</h1>
        <ul>
            @foreach($users as $user)
                <li class="mb-2">{{ $user->name }} - {{ $user->email }}</li>
            @endforeach
        </ul>
    </div>
</body>
</html>

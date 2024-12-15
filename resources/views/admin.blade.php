<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-1/4 bg-blue-900 text-white h-screen">
            <div class="p-4">
                <h2 class="text-2xl font-bold">Admin Panel</h2>
            </div>
            <ul class="mt-4">
                <li class="p-2 hover:bg-blue-700"><a href="{{ route('admin.orders') }}">Orders</a></li>
            </ul>
        </aside>
        <!-- Content -->
        <main class="w-3/4 p-8">
            @yield('content')
        </main>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - LaCommerce</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-900 font-sans min-h-screen flex flex-col">
    @include('layouts.header')

    <main class="grow container mx-auto px-4 py-8">
        @yield('content')
    </main>

    @include('layouts.footer')
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - LaCommerce Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900 font-sans min-h-screen flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-900 text-white min-h-screen p-4 flex flex-col">
        <h2 class="text-2xl font-bold mb-8">Admin Panel</h2>
        <nav class="flex-1 space-y-2">
            <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'block px-4 py-2 rounded bg-gray-800 text-white font-medium shadow-sm border-l-4 border-indigo-500' : 'block px-4 py-2 rounded text-gray-400 font-medium hover:bg-gray-800 hover:text-white transition' }}">Products</a>
            <a href="{{ route('admin.orders.index') }}" class="{{ request()->routeIs('admin.orders.*') ? 'block px-4 py-2 rounded bg-gray-800 text-white font-medium shadow-sm border-l-4 border-indigo-500' : 'block px-4 py-2 rounded text-gray-400 font-medium hover:bg-gray-800 hover:text-white transition' }}">Orders</a>
            <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'block px-4 py-2 rounded bg-gray-800 text-white font-medium shadow-sm border-l-4 border-indigo-500' : 'block px-4 py-2 rounded text-gray-400 font-medium hover:bg-gray-800 hover:text-white transition' }}">Users</a>
            <a href="{{ route('admin.admins.index') }}" class="{{ request()->routeIs('admin.admins.*') ? 'block px-4 py-2 rounded bg-gray-800 text-white font-medium shadow-sm border-l-4 border-indigo-500' : 'block px-4 py-2 rounded text-gray-400 font-medium hover:bg-gray-800 hover:text-white transition' }}">Admins</a>
            <a href="/" target="_blank" class="px-4 py-2 rounded text-gray-400 font-medium hover:bg-gray-800 hover:text-white transition mt-4 flex items-center gap-2">
                Launch Store
                <svg class="w-4 h-4 ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col min-h-screen">
        <header class="bg-white shadow-sm px-8 py-4 flex items-center justify-between">
            <h1 class="text-xl font-semibold">@yield('page_title', 'Dashboard')</h1>
        </header>
        
        <div class="p-8 flex-1 overflow-auto">
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg shadow-sm border border-green-200">
                    {{ session('success') }}
                </div>
            @endif
            
            @yield('content')
        </div>
    </main>
</body>
</html>

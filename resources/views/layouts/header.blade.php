<header class="bg-white border-b border-gray-100 shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-4 h-16 flex items-center justify-between">
        <!-- Logo -->
        <a href="/" class="text-2xl font-bold text-blue-600 tracking-tighter">
            La<span class="text-gray-900">Commerce</span>
        </a>

        <!-- Navigation Links (Desktop) -->
        <nav class="hidden md:flex items-center space-x-8">
            <a href="/" class="text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors">Home</a>
            <a href="/products"
                class="text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors">Products</a>
            <a href="/cart" class="text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors">Cart</a>
        </nav>

        <!-- Search -->
        <div class="flex items-center space-x-4">
            <div class="relative hidden sm:block">
                <input type="text" placeholder="Search products..."
                    class="bg-gray-100 border-none rounded-full py-2 px-4 text-sm w-48 focus:ring-2 focus:ring-blue-500 transition-all">
            </div>

            <!-- Mobile Menu Toggle (Simplified) -->
            <button class="md:hidden text-gray-700">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
        </div>
    </div>
</header>
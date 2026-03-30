<header class="bg-white border-b border-gray-100 shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-4 h-16 flex items-center justify-between">
        <!-- Logo -->
        <a href="/" class="text-2xl font-bold text-blue-600 tracking-tighter">
            La<span class="text-gray-900">Commerce</span>
        </a>

        <!-- Desktop Navigation -->
        <nav class="hidden lg:flex items-center space-x-8">
            <a href="/" class="text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors">Home</a>
            <a href="{{ route('products.index') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors">Products</a>
            <a href="{{ route('about') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors">About</a>
            <a href="{{ route('contact') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors">Contact</a>

            @if(auth()->check())
                @if(auth()->user()->is_admin)
                    <a href="{{ route('admin.products.index') }}" class="text-sm font-semibold text-indigo-600 border border-indigo-200 bg-indigo-50 px-3 py-1.5 rounded-lg hover:bg-indigo-100 transition-colors">Admin Panel</a>
                @endif
                <a href="{{ route('account.edit') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Account
                </a>
            @else
                <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors">Sign in</a>
            @endif

            <a href="{{ route('cart.index') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors flex items-center gap-1">
                Cart
                <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                @if(session('cart'))
                    <span class="ml-0.5 bg-blue-600 text-white text-[10px] font-bold px-2 py-0.5 rounded-full inline-flex items-center justify-center">{{ count((array) session('cart')) }}</span>
                @endif
            </a>
        </nav>

        <!-- Right side: Cart (always visible on mobile) + Hamburger -->
        <div class="flex items-center gap-3 lg:hidden">
            <a href="{{ route('cart.index') }}" class="text-gray-700 hover:text-blue-600 transition-colors flex items-center gap-1 text-sm font-medium">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                @if(session('cart'))
                    <span class="bg-blue-600 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full">{{ count((array) session('cart')) }}</span>
                @endif
            </a>

            <!-- Hamburger button -->
            <button id="mobile-menu-btn" aria-expanded="false" aria-controls="mobile-menu" class="text-gray-700 hover:text-blue-600 transition-colors p-1">
                <svg id="icon-open" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg id="icon-close" class="h-6 w-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu Drawer -->
    <nav id="mobile-menu" class="hidden lg:hidden border-t border-gray-100 bg-white px-4 pb-4 pt-2 shadow-lg">
        <div class="flex flex-col space-y-1">
            <a href="/" class="block px-3 py-2.5 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-blue-600 transition-colors">Home</a>
            <a href="{{ route('products.index') }}" class="block px-3 py-2.5 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-blue-600 transition-colors">Products</a>
            <a href="{{ route('about') }}" class="block px-3 py-2.5 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-blue-600 transition-colors">About</a>
            <a href="{{ route('contact') }}" class="block px-3 py-2.5 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-blue-600 transition-colors">Contact</a>

            <div class="border-t border-gray-100 my-2 pt-2 space-y-1">
                @if(auth()->check())
                    @if(auth()->user()->is_admin)
                        <a href="{{ route('admin.products.index') }}" class="block px-3 py-2.5 rounded-lg text-sm font-semibold text-indigo-600 bg-indigo-50 hover:bg-indigo-100 transition-colors">
                            Admin Panel
                        </a>
                    @endif
                    <a href="{{ route('account.edit') }}" class="flex items-center gap-2 px-3 py-2.5 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-blue-600 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        Account <span class="text-xs text-gray-400 font-normal">({{ auth()->user()->name }})</span>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="block px-3 py-2.5 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-blue-600 transition-colors">Sign in</a>
                @endif
            </div>
        </div>
    </nav>
</header>

<script>
    const btn = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');
    const iconOpen = document.getElementById('icon-open');
    const iconClose = document.getElementById('icon-close');

    btn.addEventListener('click', () => {
        const isOpen = !menu.classList.contains('hidden');
        menu.classList.toggle('hidden');
        iconOpen.classList.toggle('hidden', !isOpen);
        iconClose.classList.toggle('hidden', isOpen);
        btn.setAttribute('aria-expanded', String(!isOpen));
    });
</script>
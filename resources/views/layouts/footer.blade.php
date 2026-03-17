<footer class="bg-white border-t border-gray-100 pt-16 pb-8">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
            <!-- Brand Brief -->
            <div class="col-span-1">
                <a href="/" class="text-xl font-bold text-blue-600 tracking-tighter mb-4 block">
                    La<span class="text-gray-900">Commerce</span>
                </a>
                <p class="text-gray-500 text-sm leading-relaxed">
                    Elevate your shopping experience with curated collections of premium essentials.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="font-semibold text-gray-900 mb-6 uppercase text-xs tracking-widest">Shop</h4>
                <ul class="space-y-4">
                    <li><a href="/products" class="text-sm text-gray-500 hover:text-blue-600 transition-colors">All
                            Products</a></li>
                    <li><a href="/new-arrivals" class="text-sm text-gray-500 hover:text-blue-600 transition-colors">New
                            Arrivals</a></li>
                    <li><a href="/best-sellers" class="text-sm text-gray-500 hover:text-blue-600 transition-colors">Best
                            Sellers</a></li>
                </ul>
            </div>

            <!-- Support -->
            <div>
                <h4 class="font-semibold text-gray-900 mb-6 uppercase text-xs tracking-widest">Support</h4>
                <ul class="space-y-4">
                    <li><a href="/faq" class="text-sm text-gray-500 hover:text-blue-600 transition-colors">Help &
                            FAQ</a></li>
                    <li><a href="/shipping" class="text-sm text-gray-500 hover:text-blue-600 transition-colors">Shipping
                            Info</a></li>
                    <li><a href="/returns"
                            class="text-sm text-gray-500 hover:text-blue-600 transition-colors">Returns</a></li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div>
                <h4 class="font-semibold text-gray-900 mb-6 uppercase text-xs tracking-widest">Stay Updated</h4>
                <form class="flex">
                    <input type="email" placeholder="Email address"
                        class="bg-gray-100 border-none rounded-l-lg py-2 px-4 text-sm w-full focus:ring-1 focus:ring-blue-500">
                    <button
                        class="bg-gray-900 text-white px-4 py-2 rounded-r-lg text-sm font-medium hover:bg-gray-800 transition-all">
                        Join
                    </button>
                </form>
            </div>
        </div>

        <div class="border-t border-gray-50 pt-8 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-gray-400 text-xs text-center">
                Copyright &copy; {{ date('Y') }} LaCommerce. All rights reserved.
            </p>
            <div class="flex items-center space-x-6">
                <a href="#" class="text-gray-400 hover:text-gray-900 transition-colors">
                    <span class="sr-only">Twitter</span>
                    <!-- Simple SVG icon placeholder or text -->
                    <span class="text-[10px] uppercase font-bold tracking-tighter">Twitter</span>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-900 transition-colors">
                    <span class="sr-only">Instagram</span>
                    <span class="text-[10px] uppercase font-bold tracking-tighter">Instragram</span>
                </a>
            </div>
        </div>
    </div>
</footer>
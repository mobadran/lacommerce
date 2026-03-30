@extends('layouts.master')

@section('title', 'About Us')

@section('content')
<div class="py-12 md:py-20 max-w-5xl mx-auto px-4">
    <div class="text-center mb-12 space-y-6">
        <span class="text-sm font-bold tracking-widest text-blue-600 uppercase">Our Story</span>
        <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 tracking-tight">
            Crafting the <span class="text-transparent bg-clip-text bg-linear-to-r from-blue-600 to-indigo-500">Modern Lifestyle</span>
        </h1>
        <p class="text-xl text-gray-600 leading-relaxed max-w-2xl mx-auto">
            LaCommerce was born out of a simple desire: to bring exceptionally crafted, thoughtfully designed essentials to everyday life.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center mb-12">
        <div class="aspect-square rounded-3xl overflow-hidden relative shadow-2xl group">
            <div class="absolute inset-0 bg-linear-to-br from-gray-100 to-gray-200 flex items-center justify-center transition-transform duration-700 group-hover:scale-105">
                <svg class="w-24 h-24 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            </div>
        </div>
        <div class="space-y-6">
            <h2 class="text-3xl font-bold text-gray-900">Our Philosophy</h2>
            <div class="w-12 h-1 bg-blue-600 rounded"></div>
            <p class="text-gray-600 text-lg leading-relaxed">
                We believe that the objects we surround ourselves with have a profound impact on our well-being and productivity. That's why every product in our collection is meticulously selected for its perfect balance of form and function.
            </p>
            <p class="text-gray-600 text-lg leading-relaxed pt-2">
                We're committed to sustainability, working directly with artisans and ethical manufacturers who share our vision for a beautifully considered world without compromising on environmental responsibility.
            </p>
        </div>
    </div>

    <div class="bg-gray-900 p-10 md:p-20 text-center relative overflow-hidden shadow-2xl rounded-2xl">
        <div class="absolute top-0 left-0 w-full h-full bg-linear-to-b from-white/5 to-transparent"></div>
        <div class="relative z-10 md:p-6">
            <h3 class="text-3xl md:text-4xl font-bold text-white mb-6">Ready to elevate your space?</h3>
            <p class="text-gray-400 mb-10 text-lg max-w-xl mx-auto">
                Explore our carefully curated selection and discover the perfect piece for your modern lifestyle.
            </p>
            <a href="/products" class="bg-white text-gray-900 px-4 py-2 rounded-full font-semibold text-center hover:bg-blue-50 transition-all shadow-xl hover:shadow-white/10 hover:-translate-y-1">
                Shop the Collection
            </a>
        </div>
    </div>
</div>
@endsection

@extends('layouts.master')

@section('title', 'Welcome to LaCommerce')

@section('content')
<div class="py-12 md:py-24">
    <div class="max-w-2xl">
        <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 tracking-tight mb-6">
            Premium essentials for your <span class="text-blue-600">modern lifestyle</span>.
        </h1>
        <p class="text-lg text-gray-600 mb-10 leading-relaxed">
            Discover a curated collection of high-quality products designed for those who value both form and function.
            Shop the latest arrivals now.
        </p>
        <div class="flex flex-col sm:flex-row gap-4">
            <a href="/products"
                class="bg-gray-900 text-white px-8 py-4 rounded-xl font-semibold text-center hover:bg-gray-800 transition-all shadow-lg hover:shadow-xl">
                Shop Collection
            </a>
            <a href="/about"
                class="bg-white text-gray-700 border border-gray-200 px-8 py-4 rounded-xl font-semibold text-center hover:bg-gray-50 transition-all">
                Our Story
            </a>
        </div>
    </div>

    <!-- Featured products -->
    <h2 class="text-3xl mt-18 font-bold text-gray-900 mb-6">Featured Products</h2>
    <div class="mt-2 grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach ($products as $product)
        <a href="{{ route('products.show', $product) }}"
            class="bg-white p-2 rounded-2xl shadow-sm border border-gray-100 group cursor-pointer hover:shadow-md transition-all">
            <div class="aspect-square bg-gray-100 rounded-xl mb-4 overflow-hidden relative">
                <img src="{{ $product->image }}" alt="{{ $product->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform">
            </div>
            <div class="p-4">
                <h3 class="font-bold text-gray-900">{{ $product->title }}</h3>
                <p class="text-sm text-gray-500">${{ $product->price }}</p>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
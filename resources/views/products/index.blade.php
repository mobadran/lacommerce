@extends('layouts.master')

@section('title', 'Products')

@section('content')
    <h2 class="text-3xl mt-18 font-bold text-gray-900 mb-6">Products</h2>
    <div class="mt-2 grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach ($products as $product)
            <div
                class="bg-white p-2 rounded-2xl shadow-sm border border-gray-100 group cursor-pointer hover:shadow-md transition-all">
                <div class="aspect-square bg-gray-100 rounded-xl mb-4 overflow-hidden relative">
                    <img src="{{ $product['image'] }}" alt="{{ $product['title'] }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform">
                    <div
                        class="absolute top-3 right-3 bg-white/80 backdrop-blur-sm p-2 rounded-full opacity-0 group-hover:opacity-100 transition-opacity">
                        <svg class="h-5 w-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-7.682-7.682a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                </div>
                <div class="px-2 pb-2">
                    <h3 class="font-semibold text-gray-900 text-lg mb-1">{{ $product["title"] }}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{ $product["description"] }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-xl font-bold text-gray-900">${{ $product["price"] }}</span>
                        <form action="/cart/{{ $product->id }}" method="POST">
                            @csrf
                            <button
                                class="bg-gray-900 text-white px-4 py-2 rounded-full hover:bg-gray-800 transition-colors text-sm font-medium">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@extends('layouts.master')

@section('title', $product->title)

@section('content')
    <div class="py-8 md:py-16">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row -mx-4">
                <div class="md:flex-1 px-4">
                    <div class="h-96 md:h-[500px] rounded-2xl overflow-hidden mb-6 bg-gray-100 flex items-center justify-center">
                        @if($product->image)
                            <img class="w-full h-full object-cover" src="{{ asset($product->image) }}" alt="{{ $product->title }}">
                        @else
                            <span class="text-gray-400">No Image</span>
                        @endif
                    </div>
                </div>
                <div class="md:flex-1 px-4 flex flex-col justify-center">
                    <h2 class="text-3xl md:text-5xl font-extrabold text-gray-900 mb-4">{{ $product->title }}</h2>
                    <div class="flex items-center mb-6">
                        <div class="mr-4">
                            <span class="text-3xl font-bold text-gray-900">${{ number_format($product->price, 2) }}</span>
                        </div>
                    </div>
                    <p class="text-gray-700 text-lg mb-8 leading-relaxed">
                        {{ $product->description }}
                    </p>
                    <div class="mb-6">
                        <span class="font-bold text-gray-700">Availability:</span>
                        <span class="{{ $product->stock > 0 ? 'text-green-600 font-medium' : 'text-red-500 font-medium' }}">
                            {{ $product->stock > 0 ? $product->stock . ' in stock' : 'Out of stock' }}
                        </span>
                    </div>

                    <div class="flex pb-4">
                        <form action="/cart/{{ $product->id }}" method="POST" class="w-full">
                            @csrf
                            <button class="w-full {{ $product->stock > 0 ? 'bg-gray-900 hover:bg-gray-800' : 'bg-gray-400 cursor-not-allowed' }} text-white px-8 py-4 rounded-xl font-semibold transition-all {{ $product->stock > 0 ? 'shadow-lg hover:shadow-xl' : '' }} text-center flex items-center justify-center gap-2" {{ $product->stock <= 0 ? 'disabled' : '' }}>
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                {{ $product->stock > 0 ? 'Add to Cart' : 'Out of Stock' }}
                            </button>
                        </form>
                    </div>

                    <div class="border-t border-gray-200 pt-8 mt-auto">
                        <a href="{{ route('products.index') }}" class="text-blue-600 hover:text-blue-800 font-medium flex items-center gap-2 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Back to Products
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

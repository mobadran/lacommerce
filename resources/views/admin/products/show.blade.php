@extends('admin.layouts.app')

@section('title', 'View Product')
@section('page_title', 'View Product')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 max-w-4xl">
    <div class="flex justify-between items-center mb-6 pb-4 border-b border-gray-100">
        <h2 class="text-xl font-semibold text-gray-800">Product Details #{{ $product->id }}</h2>
        <div class="flex gap-2">
            <a href="{{ route('admin.products.edit', $product) }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition font-medium text-sm">
                Edit Product
            </a>
            <a href="{{ route('admin.products.index') }}" class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition font-medium text-sm">
                Back to List
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div>
            <h3 class="text-sm font-semibold text-gray-500 uppercase mb-2">Image</h3>
            <div class="bg-gray-50 rounded-lg p-4 flex items-center justify-center border border-gray-100">
                @if($product->image)
                    <img src="{{ $product->image }}" alt="{{ $product->title }}" class="max-w-full h-auto rounded shadow-sm">
                @else
                    <div class="py-12 text-gray-400">No Image Available</div>
                @endif
            </div>
        </div>
        
        <div class="space-y-6">
            <div>
                <h3 class="text-sm font-semibold text-gray-500 uppercase mb-1">Title</h3>
                <p class="text-lg font-medium text-gray-900">{{ $product->title }}</p>
            </div>
            
            <div>
                <h3 class="text-sm font-semibold text-gray-500 uppercase mb-1">Description</h3>
                <p class="text-gray-700 whitespace-pre-wrap">{{ $product->description ?: 'No description provided.' }}</p>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <h3 class="text-sm font-semibold text-gray-500 uppercase mb-1">Price</h3>
                    <p class="text-lg font-bold text-green-600">${{ number_format($product->price, 2) }}</p>
                </div>
                
                <div>
                    <h3 class="text-sm font-semibold text-gray-500 uppercase mb-1">Stock status</h3>
                    <span class="inline-block px-3 py-1 rounded-full text-sm font-medium {{ $product->stock > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $product->stock }} {{ $product->stock == 1 ? 'item' : 'items' }}
                    </span>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 border-t border-gray-100 pt-6">
                <div>
                    <h3 class="text-sm font-semibold text-gray-500 uppercase mb-1">Created At</h3>
                    <p class="text-gray-600 text-sm">{{ $product->created_at->format('M d, Y h:i A') }}</p>
                </div>
                
                <div>
                    <h3 class="text-sm font-semibold text-gray-500 uppercase mb-1">Updated At</h3>
                    <p class="text-gray-600 text-sm">{{ $product->updated_at->format('M d, Y h:i A') }}</p>
                </div>
            </div>
            
            <div class="border-t border-gray-100 pt-6">
                <a href="{{ route('products.show', $product) }}" target="_blank" class="text-indigo-600 hover:text-indigo-800 font-medium inline-flex items-center gap-1">
                    View Public Page
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

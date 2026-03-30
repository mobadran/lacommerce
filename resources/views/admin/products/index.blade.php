@extends('admin.layouts.app')

@section('title', 'Manage Products')
@section('page_title', 'Manage Products')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg font-semibold">All Products</h2>
        <a href="{{ route('admin.products.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition font-medium text-sm">
            + New Product
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-600 text-sm">
                    <th class="py-3 px-4 border-b">ID</th>
                    <th class="py-3 px-4 border-b">Image</th>
                    <th class="py-3 px-4 border-b">Title</th>
                    <th class="py-3 px-4 border-b">Price</th>
                    <th class="py-3 px-4 border-b">Stock</th>
                    <th class="py-3 px-4 border-b text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                <tr class="hover:bg-gray-50 border-b last:border-0">
                    <td class="py-3 px-4">{{ $product->id }}</td>
                    <td class="py-3 px-4">
                        @if($product->image)
                            <img src="{{ $product->image }}" alt="{{ $product->title }}" class="w-10 h-10 rounded object-cover">
                        @else
                            <div class="w-10 h-10 bg-gray-200 rounded flex items-center justify-center text-xs text-gray-500">N/A</div>
                        @endif
                    </td>
                    <td class="py-3 px-4 font-medium">{{ $product->title }}</td>
                    <td class="py-3 px-4">${{ number_format($product->price, 2) }}</td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-1 rounded-full text-xs {{ $product->stock > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $product->stock }}
                        </span>
                    </td>
                    <td class="py-3 px-4 text-right space-x-2">
                        <a href="{{ route('admin.products.show', $product) }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium cursor-pointer">View</a>
                        <a href="{{ route('admin.products.edit', $product) }}" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium cursor-pointer">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this product?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-medium cursor-pointer">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-8 text-center text-gray-500">No products found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

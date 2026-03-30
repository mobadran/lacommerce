@extends('admin.layouts.app')

@section('title', 'Order Details')
@section('page_title', 'Order # ' . $order->id)

@section('content')
<div class="flex justify-between items-center mb-6">
    <a href="{{ route('admin.orders.index') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900 flex items-center gap-1 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Back to Orders
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Main Info & Items -->
    <div class="lg:col-span-2 space-y-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-gray-900">Order Items</h2>
                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold">{{ $order->items->count() }} items</span>
            </div>
            
            <div class="space-y-4">
                @foreach($order->items as $item)
                <div class="flex items-center gap-4 py-2">
                    <div class="w-16 h-16 bg-gray-50 rounded-lg overflow-hidden border border-gray-100 shrink-0">
                        @if($item->product && $item->product->image)
                            <img src="{{ $item->product->image }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-300 text-xs">No image</div>
                        @endif
                    </div>
                    <div class="flex-1">
                        <h3 class="font-medium text-gray-900">{{ $item->product ? $item->product->title : 'Deleted Product' }}</h3>
                        <div class="text-sm text-gray-500">${{ number_format($item->price, 2) }} <span class="mx-1">&times;</span> {{ $item->quantity }}</div>
                    </div>
                    <div class="font-semibold text-gray-900 text-right">
                        ${{ number_format($item->price * $item->quantity, 2) }}
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="mt-6 pt-6 border-t border-gray-100 bg-gray-50 -mx-6 -mb-6 p-6 rounded-b-xl">
                <div class="flex justify-between items-center text-lg">
                    <span class="font-semibold text-gray-900">Total Amount</span>
                    <span class="font-extrabold text-blue-600 text-2xl">${{ number_format($order->total_amount, 2) }}</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Sidebar Meta -->
    <div class="space-y-6">
        <!-- Status Panel -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                Order Status
                @php
                    $statusColors = [
                        'pending' => 'bg-yellow-100 text-yellow-800',
                        'shipped' => 'bg-blue-100 text-blue-800',
                        'delivered' => 'bg-green-100 text-green-800',
                        'cancelled' => 'bg-red-100 text-red-800',
                    ];
                    $dotColors = [
                        'pending' => 'bg-yellow-500',
                        'shipped' => 'bg-blue-500',
                        'delivered' => 'bg-green-500',
                        'cancelled' => 'bg-red-500',
                    ];
                @endphp
                <span class="flex h-2.5 w-2.5 rounded-full {{ $dotColors[$order->status] ?? 'bg-gray-500' }}"></span>
            </h2>

            <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="space-y-4">
                @csrf
                @method('PATCH')
                <select name="status" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-3 py-2 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 font-medium uppercase text-sm cursor-pointer">
                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                    <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
                <button type="submit" class="w-full bg-indigo-600 text-white font-medium py-2 px-4 rounded-lg hover:bg-indigo-700 transition shadow-sm hover:shadow">Update Status</button>
            </form>
            
            <div class="mt-6 pt-6 border-t border-gray-100 space-y-4">
                <div class="text-sm flex justify-between items-center">
                    <span class="text-gray-500">Date Placed</span>
                    <div class="font-medium text-gray-900">{{ $order->created_at->format('M d, Y h:i A') }}</div>
                </div>
                <div class="text-sm flex justify-between items-center">
                    <span class="text-gray-500">Payment Method</span>
                    <div class="font-medium px-2 py-0.5 bg-gray-100 rounded text-gray-800 uppercase text-xs">{{ $order->payment_method }}</div>
                </div>
            </div>
        </div>
        
        <!-- Customer Details -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Customer Info</h2>
            <div class="space-y-4 text-sm">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-gray-400 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <div>
                        <div class="font-medium text-gray-900">{{ $order->name }}</div>
                        <a href="mailto:{{ $order->email }}" class="text-indigo-600 hover:text-indigo-800 transition-colors">{{ $order->email }}</a>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    <div class="font-medium text-gray-900">{{ $order->phone }}</div>
                </div>
                <div class="flex items-start gap-3 border-t border-gray-100 pt-4 mt-2">
                    <svg class="w-5 h-5 text-gray-400 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <div class="font-medium text-gray-900">
                        {{ $order->address }}<br>
                        {{ $order->city }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('admin.layouts.app')

@section('title', 'Manage Orders')
@section('page_title', 'Manage Orders')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg font-semibold">All Orders</h2>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-600 text-sm">
                    <th class="py-3 px-4 border-b">ID</th>
                    <th class="py-3 px-4 border-b">Customer</th>
                    <th class="py-3 px-4 border-b">Date</th>
                    <th class="py-3 px-4 border-b">Total</th>
                    <th class="py-3 px-4 border-b">Status</th>
                    <th class="py-3 px-4 border-b text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                <tr class="hover:bg-gray-50 border-b last:border-0">
                    <td class="py-3 px-4 font-medium">#{{ $order->id }}</td>
                    <td class="py-3 px-4">
                        <div class="font-medium text-gray-900">{{ $order->name }}</div>
                        <div class="text-xs text-gray-500">{{ $order->email }}</div>
                    </td>
                    <td class="py-3 px-4 text-sm text-gray-600">{{ $order->created_at->format('M d, Y') }}</td>
                    <td class="py-3 px-4 font-medium text-gray-900">${{ number_format($order->total_amount, 2) }}</td>
                    <td class="py-3 px-4">
                        @php
                            $statusColors = [
                                'pending' => 'bg-yellow-100 text-yellow-800',
                                'shipped' => 'bg-blue-100 text-blue-800',
                                'delivered' => 'bg-green-100 text-green-800',
                                'cancelled' => 'bg-red-100 text-red-800',
                            ];
                            $color = $statusColors[$order->status] ?? 'bg-gray-100 text-gray-800';
                        @endphp
                        <span class="px-2 py-1 rounded-full text-xs font-semibold uppercase {{ $color }}">
                            {{ $order->status }}
                        </span>
                    </td>
                    <td class="py-3 px-4 text-right space-x-2">
                        <a href="{{ route('admin.orders.show', $order) }}" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium cursor-pointer bg-indigo-50 px-3 py-1.5 rounded-lg hover:bg-indigo-100 transition-colors">View Details</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-8 text-center text-gray-500">No orders found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

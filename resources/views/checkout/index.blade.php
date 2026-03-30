@extends('layouts.master')

@section('title', 'Checkout')

@section('content')
<div class="py-12 md:py-20 max-w-6xl mx-auto px-4">
    <div class="mb-10 text-center">
        <h1 class="text-4xl mx-auto font-extrabold text-gray-900 tracking-tight">Checkout</h1>
    </div>

    @if(session('error'))
        <div class="mb-8 p-4 bg-red-50 text-red-700 rounded-xl border border-red-200">
            {{ session('error') }}
        </div>
    @endif

    <div class="flex flex-col lg:flex-row gap-12">
        <div class="lg:w-2/3">
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Shipping Details</h2>
                
                <form action="{{ route('checkout.store') }}" method="POST" id="checkout-form">
                    @csrf
                    
                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                <input type="text" id="name" name="name" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 transition-all outline-none">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                <input type="email" id="email" name="email" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 transition-all outline-none">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                <input type="text" id="phone" name="phone" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 transition-all outline-none">
                            </div>
                            <div>
                                <label for="city" class="block text-sm font-medium text-gray-700 mb-2">City</label>
                                <input type="text" id="city" name="city" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 transition-all outline-none">
                            </div>
                        </div>

                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Exact Address</label>
                            <textarea id="address" name="address" rows="3" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 transition-all outline-none resize-none"></textarea>
                        </div>
                    </div>

                    <h2 class="text-2xl font-bold text-gray-900 mt-10 mb-6">Payment Method</h2>
                    
                    <div class="border border-blue-500 bg-blue-50 p-4 rounded-xl flex items-center mb-8">
                        <input id="cod" type="radio" checked class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                        <label for="cod" class="ml-3 block text-sm font-medium text-gray-900">
                            Cash on Delivery (COD)
                        </label>
                    </div>

                    <button type="submit" class="w-full bg-gray-900 text-white font-semibold py-4 px-6 rounded-xl hover:bg-gray-800 transition-all shadow-lg text-lg hover:-translate-y-0.5">
                        Place Order (COD)
                    </button>
                </form>
            </div>
        </div>

        <div class="lg:w-1/3">
            <div class="bg-gray-50 p-8 rounded-3xl shadow-sm border border-gray-100 sticky top-24">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 border-b border-gray-200 pb-4">Order Summary</h2>
                
                @php $total = 0 @endphp
                <div class="space-y-4 mb-6">
                    @foreach($cart as $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    <div class="flex justify-between text-gray-600 border-b border-gray-100 pb-4 last:border-0 last:pb-0">
                        <div class="flex flex-col">
                            <span class="font-medium text-gray-900">{{ $details['title'] }}</span>
                            <span class="text-sm">Qty: {{ $details['quantity'] }}</span>
                        </div>
                        <span class="font-medium text-gray-900">${{ number_format($details['price'] * $details['quantity'], 2) }}</span>
                    </div>
                    @endforeach
                </div>
                
                <div class="border-t border-gray-200 pt-6 mt-6">
                    <div class="flex justify-between items-center p-2 text-gray-600 mb-2">
                        <span>Shipping</span>
                        <span class="font-medium text-green-600">Free</span>
                    </div>
                    <div class="flex justify-between items-center p-2">
                        <span class="text-xl font-bold text-gray-900">Total</span>
                        <span class="text-3xl font-extrabold text-blue-600">${{ number_format($total, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

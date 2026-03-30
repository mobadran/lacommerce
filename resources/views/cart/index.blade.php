@extends('layouts.master')

@section('title', 'Shopping Cart')

@section('content')
<div class="py-12 md:py-20 max-w-6xl mx-auto px-4">
    <div class="mb-10">
        <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">Your Cart</h1>
    </div>

    @if(session('success'))
        <div class="mb-8 p-4 bg-green-50 text-green-700 rounded-xl border border-green-200">
            {{ session('success') }}
        </div>
    @endif

    @if(count($cart) > 0)
        <div class="flex flex-col lg:flex-row gap-12">
            <!-- Cart Items -->
            <div class="lg:w-2/3">
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="hidden sm:grid sm:grid-cols-12 gap-4 px-8 py-4 bg-gray-50 border-b border-gray-100 text-sm font-semibold text-gray-500 uppercase tracking-wider text-center">
                        <div class="col-span-6 text-left">Product</div>
                        <div class="col-span-3">Price</div>
                        <div class="col-span-2">Quantity</div>
                        <div class="col-span-1 text-right">Action</div>
                    </div>

                    <div class="divide-y divide-gray-100">
                        @php $total = 0 @endphp
                        @foreach($cart as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                            <div class="p-6 sm:px-8 flex flex-col sm:grid sm:grid-cols-12 gap-6 items-center">
                                <!-- Product Info -->
                                <div class="col-span-6 flex items-center w-full">
                                    <div class="w-24 h-24 bg-gray-50 rounded-xl overflow-hidden shrink-0 border border-gray-100">
                                        @if($details['image'])
                                            <img src="{{ asset($details['image']) }}" alt="{{ $details['title'] }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-gray-400 text-xs">No image</div>
                                        @endif
                                    </div>
                                    <div class="ml-6">
                                        <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $details['title'] }}</h3>
                                    </div>
                                </div>

                                <!-- Price -->
                                <div class="col-span-3 font-semibold text-gray-900 w-full sm:text-center text-lg">
                                    <span class="sm:hidden text-gray-500 text-sm font-normal">Price: </span>
                                    ${{ number_format($details['price'], 2) }}
                                </div>

                                <!-- Quantity -->
                                <div class="col-span-2 w-full sm:text-center flex justify-center">
                                    <form action="{{ route('cart.update', $id) }}" method="POST" class="flex items-center justify-center sm:justify-start gap-2">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <input type="number" name="quantity" value="{{ $details['quantity'] }}" class="w-14 bg-gray-50 border border-gray-200 rounded-lg px-1 py-2 text-center focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all font-medium" min="1">
                                        <button type="submit" class="text-blue-600 hover:text-blue-800 p-2 rounded-lg bg-blue-50 hover:bg-blue-100 transition-colors shrink-0 tooltip" title="Update Quantity">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                        </button>
                                    </form>
                                </div>

                                <!-- Action -->
                                <div class="col-span-1 w-full text-right sm:text-right flex justify-end">
                                    <form action="{{ route('cart.destroy', $id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <button type="submit" class="text-red-500 hover:text-red-700 p-2 bg-red-50 hover:bg-red-100 rounded-lg transition-colors inline-block tooltip" title="Remove Item">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:w-1/3">
                <div class="bg-gray-50 p-8 rounded-3xl shadow-sm border border-gray-100 sticky top-24">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 border-b border-gray-200 pb-4">Order Summary</h2>
                    
                    <div class="space-y-4 mb-6">
                        <div class="flex justify-between text-gray-600 p-2">
                            <span>Subtotal</span>
                            <span class="font-medium text-gray-900">${{ number_format($total, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-gray-600 p-2">
                            <span>Shipping</span>
                            <span class="font-medium text-green-600">Free</span>
                        </div>
                        <div class="flex justify-between text-gray-600 p-2">
                            <span>Taxes</span>
                            <span class="font-medium text-gray-900">$0.00</span>
                        </div>
                    </div>
                    
                    <div class="border-t border-gray-200 pt-6 mb-8">
                        <div class="flex justify-between items-center p-2">
                            <span class="text-xl font-bold text-gray-900">Total</span>
                            <span class="text-3xl font-extrabold text-blue-600">${{ number_format($total, 2) }}</span>
                        </div>
                    </div>
                    
                    <a href="{{ route('checkout.index') }}" class="w-full bg-gray-900 text-white py-4 rounded-xl font-semibold hover:bg-gray-800 transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5 text-lg flex items-center justify-center gap-2">
                        Proceed to Checkout
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-24 bg-white rounded-3xl shadow-sm border border-gray-100">
            <div class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6 text-gray-300">
                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Your cart is empty</h2>
            <p class="text-gray-500 mb-8 max-w-sm mx-auto px-4">Looks like you haven't added anything to your cart yet. Let's find you something special.</p>
            <a href="/products" class="inline-block bg-gray-900 text-white px-8 py-4 rounded-xl font-semibold hover:bg-gray-800 transition-all shadow-lg">
                Continue Shopping
            </a>
        </div>
    @endif
</div>
@endsection

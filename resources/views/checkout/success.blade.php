@extends('layouts.master')

@section('title', 'Order Successful')

@section('content')
<div class="py-16 md:py-32 max-w-3xl mx-auto px-4 text-center">
    <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-8 text-green-600 shadow-sm border border-green-200">
        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
    </div>
    
    <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight mb-4">
        Thank you for your order!
    </h1>
    
    <p class="text-xl text-gray-600 mb-8 p-4">
        Your order (#{{ session('order_id') }}) has been placed successfully and will be processed soon.<br> You will pay with <span class="font-semibold text-gray-900">Cash on Delivery</span>.
    </p>

    <a href="/products" class="inline-block bg-gray-900 text-white px-10 py-4 text-lg rounded-xl font-semibold hover:bg-gray-800 transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5">
        Continue Shopping
    </a>
</div>
@endsection

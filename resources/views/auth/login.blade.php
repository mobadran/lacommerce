@extends('layouts.master')

@section('title', 'Sign In')

@section('content')
<div class="py-12 md:py-24 max-w-md mx-auto px-4">
    <div class="bg-white p-8 md:p-10 rounded-3xl shadow-xl border border-gray-100">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Welcome back</h1>
            <p class="text-gray-500">Please enter your details to sign in.</p>
        </div>

        @if($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-600 rounded-xl text-sm">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 transition-all outline-none">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input type="password" id="password" name="password" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 transition-all outline-none">
            </div>

            <button type="submit" class="w-full bg-gray-900 text-white font-semibold py-3 px-4 rounded-xl hover:bg-gray-800 transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                Sign In
            </button>
        </form>

        <div class="mt-8 text-center text-sm text-gray-600">
            Don't have an account? <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 font-semibold transition-colors">Sign up</a>
        </div>
    </div>
</div>
@endsection

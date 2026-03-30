@extends('layouts.master')

@section('title', 'Create Account')

@section('content')
<div class="py-12 md:py-24 max-w-lg mx-auto px-4">
    <div class="bg-white p-8 md:p-10 rounded-3xl shadow-xl border border-gray-100">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Create an account</h1>
            <p class="text-gray-500">Join us and start your journey.</p>
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

        <form action="{{ route('register') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 transition-all outline-none">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 transition-all outline-none">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input type="password" id="password" name="password" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 transition-all outline-none">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 transition-all outline-none">
                </div>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-3 px-4 rounded-xl hover:bg-blue-700 transition-all shadow-lg hover:shadow-xl hover:shadow-blue-500/30 hover:-translate-y-0.5 mt-4">
                Create Account
            </button>
        </form>

        <div class="mt-8 text-center text-sm text-gray-600">
            Already have an account? <a href="{{ route('login') }}" class="text-gray-900 hover:text-blue-600 font-semibold transition-colors">Sign in</a>
        </div>
    </div>
</div>
@endsection

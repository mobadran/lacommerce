@extends('layouts.master')

@section('title', 'My Account')

@section('content')
<div class="py-12 md:py-20 max-w-4xl mx-auto px-4">
    <div class="flex flex-col md:flex-row gap-8 items-start">
        
        <!-- Sidebar -->
        <div class="w-full md:w-1/3 bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
            <div class="flex flex-col items-center mb-8 border-b border-gray-100 pb-6">
                <div class="w-24 h-24 bg-linear-to-tr from-blue-100 to-indigo-100 rounded-full flex items-center justify-center text-blue-600 text-3xl font-bold mb-4 shadow-sm">
                    {{ substr($user->name, 0, 1) }}
                </div>
                <h2 class="text-xl font-bold text-gray-900">{{ $user->name }}</h2>
                <p class="text-gray-500 text-sm">{{ $user->email }}</p>
                @if($user->is_admin)
                    <span class="mt-2 text-xs font-semibold bg-gray-900 text-white px-3 py-1 rounded-full uppercase tracking-wider">Admin</span>
                @endif
            </div>
            
            <nav class="space-y-2">
                <a href="{{ route('account.edit') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-gray-50 text-blue-600 font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Profile Settings
                </a>
                
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-red-600 hover:bg-red-50 font-medium transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Sign Out
                    </button>
                </form>
            </nav>
        </div>

        <!-- Main Account Content -->
        <div class="w-full md:w-2/3 bg-white p-8 md:p-10 rounded-3xl shadow-sm border border-gray-100">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 border-b border-gray-100 pb-4">Profile Information</h2>
            
            @if(session('success'))
                <div class="mb-8 p-4 bg-green-50 text-green-700 rounded-xl border border-green-200 shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-600 rounded-xl text-sm">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('account.update') }}" method="POST" class="space-y-6">
                @csrf
                @method('PATCH')
                
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 transition-all outline-none">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 transition-all outline-none">
                </div>

                <div class="border-t border-gray-100 pt-6 mt-6">
                    <h3 class="text-sm font-bold text-gray-900 mb-4 uppercase tracking-wider">Change Password</h3>
                    <p class="text-xs text-gray-500 mb-4">Leave fields blank if you do not wish to change your password.</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                        <input type="password" id="password" name="password" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 transition-all outline-none">
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 transition-all outline-none">
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="bg-gray-900 text-white font-semibold py-3 px-8 rounded-xl hover:bg-gray-800 transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@extends('admin.layouts.app')

@section('title', 'Manage Users')
@section('page_title', 'Manage Users')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg font-semibold">Standard Users</h2>
    </div>

    @if(session('error'))
        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg shadow-sm border border-red-200">
            {{ session('error') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-600 text-sm">
                    <th class="py-3 px-4 border-b">ID</th>
                    <th class="py-3 px-4 border-b">Name</th>
                    <th class="py-3 px-4 border-b">Email</th>
                    <th class="py-3 px-4 border-b">Joined</th>
                    <th class="py-3 px-4 border-b text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr class="hover:bg-gray-50 border-b last:border-0">
                    <td class="py-3 px-4 text-gray-500">{{ $user->id }}</td>
                    <td class="py-3 px-4 font-medium text-gray-900">{{ $user->name }}</td>
                    <td class="py-3 px-4 text-gray-500">{{ $user->email }}</td>
                    <td class="py-3 px-4 text-gray-500">{{ $user->created_at->format('M d, Y') }}</td>
                    <td class="py-3 px-4 text-right">
                        <form action="{{ route('admin.users.update', $user) }}" method="POST" class="inline-block" onsubmit="return confirm('Promote {{ $user->name }} to Admin?');">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="bg-indigo-50 text-indigo-600 px-3 py-1.5 rounded-lg text-sm font-medium hover:bg-indigo-100 transition-colors tooltip" title="Grant Administrator Rights">
                                Make Admin
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-8 text-center text-gray-500">No standard users found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

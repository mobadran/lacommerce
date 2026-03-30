@extends('admin.layouts.app')

@section('title', 'Manage Admins')
@section('page_title', 'Manage Admins')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg font-semibold">Administrators</h2>
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
                    <th class="py-3 px-4 border-b">Role</th>
                    <th class="py-3 px-4 border-b text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($admins as $admin)
                <tr class="hover:bg-gray-50 border-b last:border-0">
                    <td class="py-3 px-4 text-gray-500">{{ $admin->id }}</td>
                    <td class="py-3 px-4 font-medium text-gray-900 flex items-center gap-2">
                        {{ $admin->name }} 
                        @if(auth()->id() === $admin->id) 
                            <span class="text-[10px] text-indigo-600 bg-indigo-50 px-2 py-0.5 rounded font-bold uppercase tracking-widest border border-indigo-100">You</span> 
                        @endif
                    </td>
                    <td class="py-3 px-4 text-gray-500">{{ $admin->email }}</td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest bg-gray-900 text-white">Admin</span>
                    </td>
                    <td class="py-3 px-4 text-right">
                        @if(auth()->id() !== $admin->id)
                        <form action="{{ route('admin.admins.update', $admin) }}" method="POST" class="inline-block" onsubmit="return confirm('Remove {{ $admin->name }} from Admins?');">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="bg-red-50 text-red-600 px-3 py-1.5 rounded-lg text-sm font-medium hover:bg-red-100 transition-colors tooltip" title="Revoke Administrator Rights">
                                Remove Admin
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-8 text-center text-gray-500">No admins found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::where('is_admin', true)->latest()->get();
        return view('admin.admins.index', compact('admins'));
    }

    public function update(Request $request, User $admin)
    {
        if (\Illuminate\Support\Facades\Auth::id() === $admin->id) {
            return redirect()->back()->with('error', "You cannot remove your own admin privileges.");
        }

        $admin->update(['is_admin' => false]);
        return redirect()->back()->with('success', "{$admin->name} is no longer an Admin.");
    }
}

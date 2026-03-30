<?php

use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = Product::all()->take(3);
    return view('home', compact('products'));
});
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::post('/cart/{product}', [App\Http\Controllers\CartController::class, 'store'])->name('cart.store');
Route::patch('/cart/{id}', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{id}', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');

Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout/success', [App\Http\Controllers\CheckoutController::class, 'success'])->name('checkout.success');

Route::resource('products', ProductController::class);

use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\AdminController as AdminAdminController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;
use App\Http\Middleware\IsAdmin;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/account', [AccountController::class, 'edit'])->name('account.edit')->middleware('auth');
Route::patch('/account', [AccountController::class, 'update'])->name('account.update')->middleware('auth');

Route::prefix('admin')->name('admin.')->middleware(IsAdmin::class)->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.products.index');
    });
    Route::resource('products', AdminProductController::class);
    Route::resource('orders', AdminOrderController::class)->only(['index', 'show', 'update']);
    Route::resource('users', AdminUserController::class)->only(['index', 'update']);
    Route::resource('admins', AdminAdminController::class)->only(['index', 'update']);
});

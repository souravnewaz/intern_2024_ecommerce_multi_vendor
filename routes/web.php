<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Seller\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/register', [AuthController::class, 'registerForm'])->name('registerForm');
    Route::post('/register', [AuthController::class, 'register'])->name('register');

    Route::get('/register/seller', [AuthController::class, 'sellerRegistrationForm'])->name('sellerRegistrationForm');
    Route::post('/register/seller', [AuthController::class, 'sellerRegistration'])->name('sellerRegistration');
});

Route::middleware('auth')->group(function(){
    Route::get('cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('cart/store', [CartController::class, 'store'])->name('cart.store');
    Route::post('cart/{cart}/delete', [CartController::class, 'delete'])->name('cart.delete');
    Route::post('{cart}/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
});

Route::prefix('seller')->as('seller.')->middleware('seller')->group(function(){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

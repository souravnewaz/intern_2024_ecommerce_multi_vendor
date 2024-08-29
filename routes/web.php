<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/register', [AuthController::class, 'registerForm'])->name('registerForm');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function(){
    Route::get('cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('cart/store', [CartController::class, 'store'])->name('cart.store');
    Route::post('cart/{cart}/delete', [CartController::class, 'delete'])->name('cart.delete');
    Route::post('{cart}/checkout', [CartController::class, 'checkout'])->name('checkout');
});

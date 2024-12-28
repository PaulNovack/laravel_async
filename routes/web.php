<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductLaravelController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products-laravel', [ProductLaravelController::class, 'index'])->name('products.laravel.index');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;

// Public route
Route::get('/', fn() => view('welcome'));

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // —————————————————————————
    // 1) Custom endpoint for AJAX polling
    Route::get('orders/new-count', [OrderController::class, 'newOrderCount'])
        ->name('orders.newCount');

    // 2) Now register the resource routes for orders
    Route::resource('orders', OrderController::class)
        ->only(['index', 'show', 'update']);

    // Other resources
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('coupons', CouponController::class);

    // Stock update via AJAX
    Route::post('/products/{product}/update-stock', [ProductController::class, 'updateStock'])
        ->name('products.updateStock');
});

// Auth & default dashboard redirect...
require __DIR__ . '/auth.php';
Route::get('/dashboard', fn() => redirect()->route('admin.dashboard'))
    ->middleware('auth')->name('dashboard');

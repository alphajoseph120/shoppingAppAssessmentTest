<?php
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->namespace('App\Http\Controllers\Api\v1')->middleware(['isAPIValidation'])->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('login', 'index')->name('login');
    });
});

Route::prefix('v1')->namespace('App\Http\Controllers\Api\v1')->middleware(['auth:sanctum', 'isAPIUser', 'isAPIValidation'])->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('logout', 'logout')->name('logout');
    });
    Route::controller(ProductController::class)->group(function () {
        Route::post('category', 'index')->name('category');
        Route::post('product-details', 'productDetails')->name('product-details');
    });
    Route::controller(CartController::class)->group(function () {
        Route::post('add-to-cart', 'index')->name('add-to-cart');
        Route::post('place-order', 'placeOrder')->name('place-order');
    });
});
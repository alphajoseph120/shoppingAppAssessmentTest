<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::namespace('App\Http\Controllers')->middleware(['throttle:6,1,one'])->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/', 'index')->name('welcome');
        Route::post('login', 'login')->name('login');
    });
});

Route::namespace('App\Http\Controllers')->middleware(['auth'])->group(function () {
    Route::controller(DashboardController::class)->group(function () { 
        Route::get('dashboard', 'index')->name('dashboard');  
        Route::get('category-listing', 'categoryListing')->name('category-listing');  
        Route::post('logout', 'logout')->name('logout');  
    });

    Route::controller(CategoryController::class)->group(function () { 
        Route::get('product-category', 'index')->name('product-category');   
    });

    Route::controller(ProductDetailsController::class)->group(function () { 
        Route::get('product-details/{id}', 'index')->name('product-details');   
        Route::get('product-listing', 'productListing')->name('product-listing'); 
        Route::get('order-report', 'orderReport')->name('order-report');    
    });

});

<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Pos\Categories\Controllers\CategoryController;
use Pos\Products\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...
    Route::get('/dashboard', function () {
        return view('Backend.dashboard');
    })->name('dashboard');


    /**
     * Route categories
     */
    Route::resource('categories',CategoryController::class);

    /**
     * Route Products
     */
    Route::resource('products', ProductController::class);


    require __DIR__.'/auth.php';
});



<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Pos\Categories\Controllers\CategoryController;
use Pos\Invoices\Controllers\InvoiceController;
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

    Route::get('/admin_dashboard', function () {
        return view('Backend.admin_dashboard');
    })->middleware(['auth:admin'])->name('admin_dashboard');

    /**
     * Route categories
     */
    Route::resource('categories',CategoryController::class);

    /**
     * Route Products
     */
    Route::resource('products', ProductController::class);

    /**
     * Route Invoices
     */
    Route::get('/product/{id}', [InvoiceController::class, 'getProduct']);
    Route::get('/price/{id}', [InvoiceController::class, 'getPrice']);
    Route::post('Payment_status', [InvoiceController::class, 'payment_statusChange'])->name('Payment_status_change');
    Route::resource('invoices', InvoiceController::class);

    require __DIR__.'/auth.php';
});



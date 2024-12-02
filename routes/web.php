<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

Route::get('/', function () {
    return view('home');
});

Route::get('/Home', function () {
    return view('home');
});

Route::get('/About', function () {
    return view('about');
});

Route::get('/Product', function () {
    return view('product');
});

Route::get('/Testimonial', function () {
    return view('testimonial');
});

Route::get('/Why', function () {
    return view('why');
});

Route::get('/Account', function () {
    return view('account');
});

Route::get('/Prototype', function () {
    return view('layouts/uploadProductForm');
});


Route::get('/', [ProductsController::class, 'index']);

Route::get('/Home', [ProductsController::class, 'index']);

Route::get('/Product', [ProductsController::class, 'Product'])->name('Product');

Route::get('/Product/{product}', [ProductsController::class, 'detail'])->name('products.details');

Route::post('/Product', [ProductsController::class, 'store'])->name('products.store');

require __DIR__.'/auth.php';

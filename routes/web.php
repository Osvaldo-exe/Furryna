<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailController;
use App\Http\Middleware\CheckAdminEmail;

// MAIN PAGE
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
    return view('MyProfile');
});

// ACCOUNT PAGE

// MyProfile page
Route::get('/Account/MyProfile/Login', function () {
    return view('MyProfile', ['includeView' => 'layouts.login']);
})->name('MyProfileLogin');

Route::get('/Account/MyProfile', function () {
    if(Auth::check() && Auth::user()->email === 'admin@gmail.com'){
        return view('admin.AdminProfile');
    }
    else{
        return view('MyProfile', ['includeView' => 'layouts.login']);
    }
})->name('MyProfile');

Route::get('/Account/MyProfile/Sign-up', function () {
    return view('MyProfile', ['includeView' => 'layouts.signup']);
})->name('MyProfileSignUp');

// MyProducts page
Route::get('/Account/myProducts', [ProductsController::class, 'myProduct'])->name('MyProducts');

Route::get('/Account/MyProducts/Add', function () {
    return view('layouts.MyProducts', ['includeView' => 'layouts.uploadProductForm']);
})->name('addProduct');

Route::delete('/Account/MyProducts/{id}', [ProductsController::class, 'drop'])->name('dropProduct');

// Mail page
Route::get('/Mail', [MailController::class, 'mailReceived'])->name('Mail');

// CART PAGE
Route::get('/Cart', [ProductsController::class, 'Cart'])->name('Cart');

Route::post('/cart', [ProductsController::class, 'addToCart'])->name('addToCart');

Route::post('/Cart', [MailController::class, 'sendMail'])->name('Checkout');

Route::delete('/Cart/{id}', [ProductsController::class, 'dropCart'])->name('dropCart');


Route::get('/Account/MyProfile/Admin', function () {
    return view('admin.AdminProfile');
})->middleware(CheckAdminEmail::class)->name('AdminProfile');

Route::delete('/Account/myProducts/{id}', [LoginController::class, 'dropUser'])->name('dropUser');


Route::get('/', [ProductsController::class, 'index']);

Route::get('/Home', [ProductsController::class, 'index'])->name('Home');

Route::get('/Product', [ProductsController::class, 'Product'])->name('Product');

Route::get('/Product/{id}', [ProductsController::class, 'detail'])->name('products.details');

Route::post('/Product', [ProductsController::class, 'store'])->name('products.store');

Route::post('/MyProfile/Sign-up', [LoginController::class, 'store'])->name('signUpData');

Route::post('/MyProfile/Login', [LoginController::class, 'login'])->name('LoginUser');

Route::post('/MyProfile/{id}', [LoginController::class, 'updateUser'])->name('updateUser');

Route::match(['get', 'post'], '/MyProfile', [LoginController::class, 'logout'])->name('LogoutUser');

require __DIR__.'/auth.php';

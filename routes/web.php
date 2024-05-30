<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StripePaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/index', [AdminController::class, 'index'])->name('index');
Route::get('/profile', [AdminController::class, 'profile'])->name('profile');

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/about', 'about');
    Route::get('/contact', 'contact');
    Route::get('/shop', 'shop');
    Route::get('/product_details/{id}', 'product_details');
    Route::get('/cart', 'cart');
    Route::get('/order', 'my_order');

    Route::get('/signup', 'signup');
    Route::get('/signin', 'signin');
    Route::get('/forgot_pass', 'forgot_pass');

    Route::post('/addToCart', 'add_to_cart');
    Route::get('/delete_cart_item/{id}', 'delete_cart_item');
    Route::post('/updateCart/{id}', 'update_cart');

    Route::get('/checkout', 'checkout');

    Route::get('/mail', 'testMail');
});

Route::controller(StripePaymentController::class)->group(function () {
    Route::get('/stripe', 'stripe');
    Route::post('/stripe', 'stripePost')->name('stripe.post');;
});
Route::controller(AdminController::class)->middleware(['auth', 'admin'])->group(function () {
    Route::get('/products', 'product_view');
    Route::get('/customers', 'customer_view');
    Route::get('/orders', 'order_view');
    Route::post('/addProduct', 'add_product');
    Route::get('/updateProduct/{id}', 'product_details');
    Route::post('/updateProduct/{id}', 'update_product');
    Route::get('/deleteProduct/{id}', 'delete_product');
    Route::get('/userStatus/{status}/{id}', 'user_status');
    Route::get('/orderStatus/{status}/{id}', 'order_status');
});

<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//product routes
Route::get('products/category/{id}', [App\Http\Controllers\Products\ProductsController::class, 'singleCategory'])->name('single.category');
Route::get('products/single-product/{id}', [App\Http\Controllers\Products\ProductsController::class, 'singleProduct'])->name('single.product');
Route::get('products/shop', [App\Http\Controllers\Products\ProductsController::class, 'shop'])->name('products.shop');


Route::post('cart/add', [App\Http\Controllers\Products\CartController::class, 'addToCart'])->name('cart.add');
Route::get('cart', [App\Http\Controllers\Products\CartController::class, 'viewCart'])->name('cart.view');
Route::delete('cart/remove/{id}', [App\Http\Controllers\Products\CartController::class, 'removeFromCart'])->name('cart.remove');

Route::post('cart/prepare-checkout', [App\Http\Controllers\Products\CartController::class, 'checkout'])->name('cart.checkout');
Route::post('checkout/start', [App\Http\Controllers\Products\CheckoutController::class, 'start'])->name('checkout.start');
Route::get('checkout/pay', [App\Http\Controllers\Products\CheckoutController::class, 'pay'])->name('checkout.pay');


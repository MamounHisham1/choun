<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryProductsController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', HomeController::class)->name('home');

Route::get('/shop', [ShopController::class, 'index']);
Route::get('/shop/filter', [ShopController::class, 'filter']);
Route::get('/shop/{product:slug}', [ShopController::class, 'show']);

Route::get('/shop/categories/{category:slug}', CategoryProductsController::class);

Route::post('/add-to-cart/{product}', [CartController::class, 'store']);
Route::post('/add-to-wishlist/{product}', WishlistController::class);

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::get('/checkout/{order}/success', [CheckoutController::class, 'success'])->name('success')->middleware('auth');
Route::get('/checkout/{order}/cancel', [CheckoutController::class, 'cancel'])->name('cancel')->middleware('auth');
Route::post('/checkout', [CheckoutController::class, 'store'])->middleware('auth');
Route::post('/checkout/apply-coupon', [CheckoutController::class, 'applyCoupon'])->middleware('auth');

Route::post('/register', [RegisteredUserController::class, 'store'])->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');
Route::redirect('/login/login', '/')->name('login');

Route::view('/account', 'account')->middleware('auth');
Route::get('/account/orders/{order}', [OrderController::class, 'show'])->middleware('auth');
Route::get('/account/orders/{order}/edit', [OrderController::class, 'edit'])->middleware('auth');
Route::post('account/orders/{order}/update', [OrderController::class, 'update'])->middleware('auth');
Route::post('/account/orders/{order}/destroy', [OrderController::class, 'destroy'])->middleware('auth');
Route::post('/account/orders/item/{orderLine}/destroy', [OrderController::class, 'destroyOrderLine'])->middleware('auth');

Route::get('/blogs', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blogs/load-more', [BlogController::class, 'loadMore'])->name('blog.load-more');
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blog.show');

Route::get('test', function () {
    // 
});
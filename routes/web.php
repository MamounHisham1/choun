<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryProductsController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', HomeController::class)->name('home');

Route::get('/shop', [ShopController::class, 'index']);
Route::get('/shop/{product}/show', [ShopController::class, 'show']);

Route::get('/shop/categories/{category}', CategoryProductsController::class);
Route::post('/add-to-cart/{product}', [CartController::class, 'store']);

Route::post('/add-to-wishlist/{product}', WishlistController::class);

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::get('/checkout/{order}/success', [CheckoutController::class, 'success'])->name('success');
Route::get('/checkout/{order}/cancel', [CheckoutController::class, 'cancel'])->name('cancel');
Route::post('/checkout', [CheckoutController::class, 'store']);
Route::post('/checkout/apply-coupon', [CheckoutController::class, 'applyCoupon']);

Route::post('/register', [RegisteredUserController::class, 'store'])->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');

Route::view('/account', 'account');

Route::get('/admin', function () {
    return view('admin.index');
});

Route::resource('/admin/products', AdminProductController::class);
Route::resource('/admin/categories', AdminCategoryController::class);

Route::get('/admin/orders', [AdminOrderController::class, 'index']);
Route::get('/admin/orders/{order}', [AdminOrderController::class, 'show']);
Route::patch('/admin/orders/{order}', [AdminOrderController::class, 'update']);
Route::post('/admin/orders/{order}/approve', [AdminOrderController::class, 'approve']);
Route::post('/admin/orders/{order}/cancel', [AdminOrderController::class, 'cancel']);

Route::any('test/{order}/success', function(Request $request, Order $order) {
    dd($order);
});
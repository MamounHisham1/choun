<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryProductsController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

Route::get('/shop', [ShopController::class, 'index']);
Route::get('/shop/{product}/show', [ShopController::class, 'show']);

Route::get('/shop/categories/{category}', CategoryProductsController::class);

Route::post('/register', [RegisteredUserController::class, 'store'])->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');

Route::get('/admin', function () {
    return view('admin.index');
});

Route::resource('/admin/products', AdminProductController::class);
Route::resource('/admin/categories', AdminCategoryController::class);
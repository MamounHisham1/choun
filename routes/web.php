<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);
Route::get('/shop/categories/{category}', CategoryController::class);

Route::post('/register', [RegisteredUserController::class, 'store'])->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');

Route::get('/admin', function () {
    return view('admin.index');
});

Route::resource('/admin/products', ProductController::class);
Route::resource('/admin/categories', AdminCategoryController::class);
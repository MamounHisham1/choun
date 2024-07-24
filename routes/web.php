<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::post('/register', [RegisteredUserController::class, 'store'])->middleware('guest');

Route::get('/admin', function () {
    return view('admin.index');
});

Route::resource('/admin/products', ProductController::class);
Route::resource('/admin/categories', CategoryController::class);
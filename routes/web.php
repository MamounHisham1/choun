<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('admin.index');
});

Route::resource('/admin/products', ProductController::class);
Route::resource('/admin/categories', CategoryController ::class);
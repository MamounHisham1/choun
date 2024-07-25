<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function __invoke(Category $category)
    {
        return view('category');
    }
}

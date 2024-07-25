<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function __invoke()
    {
        $products = Product::latest()->paginate(9);
        $categories = Category::has('products', '>', 0)->get();
        return view('shop', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}

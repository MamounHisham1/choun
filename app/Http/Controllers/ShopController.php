<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        // $attributes = Attribute::all();
        $brands = Brand::all()->splice(1);
        $products = Product::latest()->paginate(9);
        $categories = Category::has('products', '>', 0)->get();
        return view('shop', [
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
            // 'attributes' => $attributes,
        ]);
    }

    public function show(Product $product)
    {
        
        return view('show-product', [
            'product' => $product,
        ]);
    }
}

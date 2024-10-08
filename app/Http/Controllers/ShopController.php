<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $brands = Brand::all()->splice(1);
        $products = Product::where('is_published', true)->paginate(9);
        $categories = Category::has('products', '>', 0)->get();
        return view('shop', [
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
        ]);
    }

    public function show(Product $product)
    {
        // session()->flash('product', $product);
        return view('show-product', [
            'product' => $product,
        ]);
    }

    public function filter(Request $request)
    {
        $brands = Brand::all()->skip(1);
        $categories = Category::has('products', '>', 0)->get();
        
        $products = Product::where('is_published', true)
            ->when($request->brands, fn($query) => $query->whereIn('brand_id', $request->brands))
            ->when($request->categories, fn($query) => $query->whereIn('category_id', $request->categories))
            ->when($request->price, fn($query) => $query->whereBetween('price', explode('_', $request->price)))
            ->paginate(9);
        return view('shop', [
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
        ]);
    }
}

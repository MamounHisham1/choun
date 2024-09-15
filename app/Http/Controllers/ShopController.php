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
        // $attributes = $product->attributes;
        // $attributes->map(function($attribute) {
        //     $attribute->pivot->attribute_id = Attribute::find($attribute->pivot->attribute_id);
        //     $attribute->pivot->values = AttributeValue::find(json_decode($attribute->pivot->values));
        // });
        session()->flash('product', $product);
        return view('show-product', [
            'product' => $product,
            // 'attributes' => $attributes,
        ]);
    }
}

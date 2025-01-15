<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Brand;
use App\Models\Category;
use App\Models\HomeSetting;
use App\Models\Product;
use Illuminate\Http\Request;
use LukePOLO\LaraCart\Facades\LaraCart;

class ShopController extends Controller
{
    public function index()
    {
        // $items = LaraCart::getItems();
        // foreach($items as $item) {
        //     foreach($item->options[0] as $key => $value) {
        //         $attributeValue = AttributeValue::find($value);
        //         dump($item->options[0][$key] = $attributeValue->name);
        //     }
        // }
        $cartItems = LaraCart::getItems();
        dd($cartItems);
        $brands = Brand::all()->splice(1);
        $products = Product::where('is_published', true)->paginate(9);
        $categories = Category::has('products', '>', 0)->get();
        $shopPrices = HomeSetting::where('key', 'shop_price_filter')->first()->json_value ?? [];
        foreach ($shopPrices as $price) {
            $prices[] = array_reverse($price);
        }
        return view('shop', [
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
            'prices' => $prices,
        ]);
    }

    public function show(Product $product)
    {
        $products = $product->category->products->where('id', '!==', $product->id);

        return view('show-product', [
            'product' => $product,
            'products' => $products,
        ]);
    }

    public function filter(Request $request)
    {
        $brands = Brand::all()->skip(1);
        $categories = Category::has('products', '>', 0)->withCount('products')->get();
        $shopPrices = HomeSetting::where('key', 'shop_price_filter')->first()->json_value ?? [];
        foreach ($shopPrices as $price) {
            $prices[] = array_reverse($price);
        }

        $products = Product::where('is_published', true)
            ->when($request->brands, fn($query) => $query->whereIn('brand_id', $request->brands))
            ->when($request->categories, fn($query) => $query->whereIn('category_id', $request->categories))
            ->when($request->price, fn($query) => $query->whereBetween('price', explode('_', $request->price)))
            ->paginate(9);


        return view('shop', [
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
            'prices' => $prices,
        ]);
    }
}

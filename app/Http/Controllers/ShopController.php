<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(9);
        $categories = Category::has('products', '>', 0)->get();
        return view('shop', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function show(Product $product)
    {
        $cart = Cart::getCart();
        return view('show-product', [
            'product' => $product,
            'cart' => $cart,
        ]);
    }
}

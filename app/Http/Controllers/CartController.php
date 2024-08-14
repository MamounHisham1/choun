<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request, Product $product)
    {
        Cart::addToCart($product->id, $request->quantity);

        $data = [
            'status' => 200,
            'message' => 'Product added to cart',
            'cartItems' => Cart::getItems(),
            'price' => Cart::getPrice()
        ];

        return response()->json($data);
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use LukePOLO\LaraCart\Facades\LaraCart;

class CartController extends Controller
{
    // public function store(Request $request, Product $product)
    // {
    //     // Cart::addToCart($product, $request->quantity);

    //     $data = [
    //         'status' => 200,
    //         'message' => 'Product added to cart',
    //         'cartItems' => Cart::getItems(),
    //         'price' => Cart::getSubtotal(),
    //     ];

    //     return response()->json($data);
    // }

}

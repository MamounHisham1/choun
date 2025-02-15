<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function __invoke(Request $request, Product $product)
    {
        $user = auth()->user();

        Wishlist::create([
            'product_id' => $product->id,
            'user_id' => $user->id,
        ]);

        $data = [
            'status' => 200,
            'bg' => 'success',
            'message' => 'Product added to wishlist',
            'wishlistItems' => Wishlist::getItems($user->id),
        ];
        return response()->json($data);
    }
}

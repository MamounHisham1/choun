<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public static function addToCart($productId, $quantity)
    {
        $cart = session()->get('cart') ?? [];
        $cart[] = [
            'product_id' => $productId,
            'quantity' => $quantity,
        ];

        session()->put('cart', $cart);

        // TODO: Add to database
    }

    public static function getItems()
    {
        // TODO: Load session from database
        $cartProducts = [];
        $products = Product::find(array_column(session()->get('cart', []), 'product_id'))->keyBy('id');
        foreach (session()->get('cart', []) as $item) {
            $product = $products[$item['product_id']];
            $cartProducts[] = ['product' => $product, 'qty' => $item['quantity']];
        }
        return collect($cartProducts);
    }

    public static function getSubtotal()
    {
        $cartSubtotal = 0;
        foreach (session()->get('cart', []) as $item) {
            $product = Product::find($item['product_id']);
            $cartSubtotal += $product->price * $item['quantity'];
        }
        return $cartSubtotal;
    }

    public static function clearCart()
    {
        session()->remove('cart');
    }
}

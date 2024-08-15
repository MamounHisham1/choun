<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class Cart
{
    public static function addToCart(Product $product, $quantity)
    {
        if (!session()->has('cart')) {
            session()->put('cart', (string) Str::uuid());
        }
        CartItem::create([
            'uuid' => session()->get('cart'),
            'product_id' => $product->id,
            'price' => $product->price,
            'quantity' => $quantity,
        ]);
    }

    public static function getItems(): Collection
    {
        return once(fn() => CartItem::where('uuid', session('cart'))->get());
    }

    public static function getSubtotal()
    {
        $subtotal = Static::getItems()->sum('total');

        return $subtotal;
    }

    public static function clearCart()
    {
        CartItem::where('uuid', session('cart'))->delete();
    }
}

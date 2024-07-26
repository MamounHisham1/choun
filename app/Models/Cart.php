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

    public static function getCart()
    {
        // TODO: Load session from database
        return session()->get('cart') ?? [];
    }
    
    public static function clearCart()
    {
        session()->remove('cart');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'user_id'];
    protected $with = ['products', 'user'];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getItems($user_id)
    {
        $wishlistProducts = [];
        foreach(Wishlist::where('user_id', $user_id)->get() as $item) {
            $product = Product::find($item['product_id']);
            $wishlistProducts[] = $product;
        }
        return collect($wishlistProducts);
    }
}
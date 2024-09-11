<?php

namespace App\Models;

    use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'product_id', 'coupon_id', 'quantity', 'price', 'options'];

    public function casts(): array
    {
        return [
            'options' => 'json',
        ];
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function total(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->price * $this->quantity
        );
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'type',
        'amount',
        'usage_limit',
        'start_date',
        'end_date',
        'category_id',
    ];

    public function casts()
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function apply($subtotal): int 
    {
        $coupon = session()->get('coupon');
        $money = collect($coupon)->pluck('money')->last();
        $percentage = collect($coupon)->pluck('percentage')->last();

        if($money) {
            if($subtotal - $money < 0) {
                return 1;
            }
            return $subtotal - $money;
        }

        if($percentage) {
            return $subtotal - ($percentage * $subtotal) / 100;
        }
    }

    public static function calc($activeCoupon) 
    {
        $coupon = session()->get('coupon') ?? [];


        if ($activeCoupon->type == 'money') {
            $coupon[] = [
                'money' => $activeCoupon->amount,
            ];
        }

        if ($activeCoupon->type == 'percentage') {
            $coupon[] = [
                'percentage' => $activeCoupon->amount,
            ];
        }

        session()->put('coupon', $coupon);
    }
}

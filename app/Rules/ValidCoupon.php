<?php

namespace App\Rules;

use App\Models\Cart;
use App\Models\Coupon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidCoupon implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $coupon = Coupon::where('code', $value)->first();
        if (!$coupon || $coupon->start_date->isFuture()) {
            $fail('Coupon does not exists');
        }

        if ($coupon->usage_limit === 0 || $coupon->end_date->isPast()) {
            $fail('This coupon has been expired');
        }

        $products = collect(Cart::getItems()->pluck('product'));
        $couponProducts = $products->filter(fn($product) => $product->category_id == $coupon->category_id);
        if ($coupon->category && $couponProducts->isEmpty()) {
            $fail('This coupon cannot be used on this products');
        }
    }
}

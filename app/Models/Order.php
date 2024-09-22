<?php

namespace App\Models;

use App\OrderStatus;
use App\PaymentStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Sluggable\SlugOptions;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'total', 'user_id', 'shipping_address_id', 'payment_method', 'payment_status', 'note', 'code'];

    protected $casts = [
        'status' => OrderStatus::class,
        'payment_status' => PaymentStatus::class,
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('code')
            ->saveSlugsTo('slug');
    }

    public function orderLines()
    {
        return $this->hasMany(OrderLine::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function shippingAddress(): BelongsTo
    {
        return $this->belongsTo(ShippingAddress::class);
    }

    public function coupon(): BelongsTo
    {
        return $this->belongsTo(Coupon::class);
    }

    public function approve()
    {
        $this->status = OrderStatus::Approved;

        $this->save();
    }

    public function cancel()
    {
        $this->status = OrderStatus::Canceled;

        $this->save();
    }
}

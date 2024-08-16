<?php

namespace App\Models;

use App\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'total', 'user_id', 'shipping_address_id'];

    protected $casts = [
        'status' => OrderStatus::class,
    ];

    public function orderLines()
    {
        return $this->hasMany(OrderLine::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shippingAddress()
    {
        return $this->belongsTo(ShippingAddress::class);
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

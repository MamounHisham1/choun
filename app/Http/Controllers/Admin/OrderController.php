<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        /**
         * @var Order
         */
        $orders = Order::latest()
            ->when($request->status, fn(Builder $query) => $query->where('status', $request->status))
            ->paginate(9);


        return view('admin.orders.index', [
            'orders' => $orders,
        ]);
    }
}

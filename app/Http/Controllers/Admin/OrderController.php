<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        /**
         * @var Order
         */
        $orders = Order::latest()->paginate(9);

        return view('admin.orders.index', [
            'orders' => $orders,
        ]);
    }
}

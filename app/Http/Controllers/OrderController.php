<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderLine;
use App\OrderStatus;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show(Order $order)
    {
        if(! Gate::allows('order', $order)) {
            abort(404);
        }
        
        return view('order.view', [
            'order' => $order,
        ]);
    }

    public function edit(Order $order, Request $request)
    {
        if(! Gate::allows('order', $order)) {
            abort(404);
        }
        if (! $order->status == OrderStatus::Pending && abs($order->created_at->diffInHours(now())) < 6) {
            abort(404);
        }

        return view('order.edit', [
            'order' => $order,
        ]);
    }

    public function destroyOrderLine(OrderLine $orderLine)
    {
        $orderLine->delete();
        return response()->json();
    }
}

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
        if (Gate::denies('view', $order)) {
            abort(404);
        }

        return view('order.view', [
            'order' => $order,
        ]);
    }

    public function edit(Order $order, Request $request)
    {
        if (abs($order->created_at->diffInHours(now())) > 6) {
            abort(404);
        }

        if ($order->status !== OrderStatus::Pending) {
            abort(404);
        }

        // if (!Gate::allows('order', $order)) {
        //     abort(404);
        // }

        return view('order.edit', [
            'order' => $order,
        ]);
    }

    public function update(Order $order, Request $request)
    {
        foreach($request->orderLines as $orderLine => $quantity) {
            OrderLine::find($orderLine)->update(compact('quantity'));
        }
        
        return redirect()->back();
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect('/account');
    }

    public function destroyOrderLine(OrderLine $orderLine, Request $request)
    {
        $orderLine->delete();
    }
}

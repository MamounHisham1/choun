<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupon;
use App\Models\OrderLine;
use App\Models\Order;
use App\Models\Product;
use App\Models\ShippingAddress;
use App\Models\User;
use App\OrderStatus;
use App\Rules\ValidCoupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (empty(Cart::getItems())) {
            return redirect('/shop');
        }

        return view('checkout', [
            'subtotal' => Cart::getSubtotal(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'street' => ['required'],
            'city' => ['required'],
            'phone' => ['required', 'numeric'],
        ]);

        $user = Auth::user();

        if (!$user && $request->has('create-account')) {
            $request->validate([
                'email' => ['unique:users,email'],
            ]);

            $user = User::create([
                ...$data,
                'password' => '12345678'
            ]);
            Auth::login($user);
        }
        $data['user_id'] = $user?->id;
        $address = ShippingAddress::create($data);

        /** @var Order */
        $order = Order::create([
            'status' => OrderStatus::Pending,
            'user_id' => $user?->id,
            'shipping_address_id' => $address->id,
            'total' => Cart::getSubtotal(),
        ]);
        
        if (session()->has('coupon')) {
            $order->update(['total' => Coupon::apply(Cart::getSubtotal())]);
        }

        foreach (Cart::getItems() as $item) {
            $order->orderLines()->create([
                'product_id' => $item->product->id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        Cart::clearCart();
        session()->flash('message', 'Your order has been sent successfully');

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function applyCoupon(Request $request)
    {
        $request->validate([
            'coupon' => ['required', new ValidCoupon]
        ]);

        $activeCoupon = Coupon::where('code', $request->coupon)->first();

        Coupon::calc($activeCoupon);

        $price = Coupon::apply(Cart::getSubtotal());

        $data = [
            'price' => $price,
            'total' => $price + 50,
        ];

        return response()->json($data);
    }
}

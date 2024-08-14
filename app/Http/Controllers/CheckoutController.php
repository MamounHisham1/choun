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
        if (empty(session()->get('cart'))) {
            return redirect('/shop');
        }
        $subtotal = 0;
        foreach (session()->get('cart') ?? [] as $item) {
            $product = Product::find($item['product_id']);

            $subtotal += $product->price * $item['quantity'];
        }
        return view('checkout', [
            'subtotal' => $subtotal,
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
        ]);

        foreach (session()->get('cart') ?? [] as $item) {
            $product = Product::find($item['product_id']);

            $order->orderLines()->create([
                'product_id' => $product->id,
                'quantity' => $item['quantity'],
                'subtotal' => $product->price * $item['quantity'],
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

        dump(Coupon::apply(1000));
    }
}

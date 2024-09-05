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
use LukePOLO\LaraCart\Facades\LaraCart;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (empty(LaraCart::getItems())) {
            return redirect('/shop');
        }

        return view('checkout', [
            'subtotal' => LaraCart::total(),
        ]);
    }

    public function store(Request $request)
    {
        // // dd(LaraCart::getItems());
        // $data = $request->validate([
        //     'email' => ['required', 'email'],
        //     'first_name' => ['required'],
        //     'last_name' => ['required'],
        //     'street' => ['required'],
        //     'city' => ['required'],
        //     'phone' => ['required', 'numeric'],
        // ]);

        // $user = Auth::user();

        // if (!$user && $request->has('create-account')) {
        //     $request->validate([
        //         'email' => ['unique:users,email'],
        //     ]);

        //     $user = User::create([
        //         ...$data,
        //         'password' => '12345678'
        //     ]);
        //     Auth::login($user);
        // }
        // $data['user_id'] = $user?->id;
        // $address = ShippingAddress::create($data);

        // /** @var Order */
        // $order = Order::create([
        //     'status' => OrderStatus::Pending,
        //     'user_id' => $user?->id,
        //     'shipping_address_id' => $address->id,
        //     'total' => LaraCart::total($formatted = false),
        // ]);

        // if (session()->has('coupon')) {
        //     $order->update(['total' => Coupon::apply(LaraCart::total($formatted = false))]);
        // }

        // $basicAttributes = [
        //     'id',
        //     'qty',
        //     'name',
        //     'taxable',
        //     'price',
        //     'tax',
        // ];
        // foreach (LaraCart::getItems() as $item) {
        //     $options = collect($item->options)->filter(fn($_, $key) => !in_array($key, $basicAttributes));
        //     $order->orderLines()->create([
        //         'product_id' => $item->id,
        //         'quantity' => $item->qty,
        //         'price' => $item->price,
        //         'options' => $options,
        //     ]);
        // }

        // LaraCart::destroyCart();
        // session()->flash('message', 'Your order has been sent successfully');

        // return redirect('/');

        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'test'
                        ],
                        'unit_amount' => 500,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('home'),
            'cancel_url' => route('checkout'),
        ]);

        return redirect()->away($session->url);
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

        $price = Coupon::apply(LaraCart::total($formatted = false));

        $data = [
            'price' => $price,
            'total' => $price + 50,
        ];

        return response()->json($data);
    }
}

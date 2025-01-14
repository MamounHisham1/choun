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
use App\PaymentStatus;
use App\Rules\ValidCoupon;
use Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LukePOLO\LaraCart\Facades\LaraCart;

class CheckoutController extends Controller
{
    protected array $lineItems = [];

    public function index()
    {
        if (empty(LaraCart::getItems())) {
            return redirect('/shop');
        }

        return view('checkout', [
            'subtotal' => LaraCart::total(),
            'shippingAddress' => auth()?->user()?->shippingAddresses?->last(),
        ]);
    }

    public function store(Request $request)
    {
        // Validate the data
        $data = $request->validate([
            'street' => ['required'],
            'city' => ['required'],
            'phone' => ['required', 'numeric'],
        ]);

        $user = Auth::user();

        $data['user_id'] = $user->id;

        $request->has('apartment') ? $data['apartment'] = $request->apartment : $data['apartment'] = null;

        $shippingAddress = ShippingAddress::create($data);

        // Create the order
        /** @var Order */
        $order = Order::create([
            'code' => str('CH-' . date('mds') . $shippingAddress->id),
            'status' => OrderStatus::Draft,
            'payment_method' => $request->payment,
            'payment_status' => PaymentStatus::Pending,
            'user_id' => $user->id,
            'shipping_address_id' => $shippingAddress->id,
            'total' => LaraCart::total($formatted = false),
        ]);

        // Check if the user applied coupon
        if (session()->has('coupon')) {
            $order->update(['total' => Coupon::apply(LaraCart::total($formatted = false))]);
        }

        // Create order lines
        $basicAttributes = [
            'id',
            'qty',
            'name',
            'taxable',
            'price',
            'tax',
        ];
        foreach (LaraCart::getItems() as $item) {
            $options = collect($item->options)->filter(fn($_, $key) => !in_array($key, $basicAttributes));
            $order->orderLines()->create([
                'product_id' => $item->id,
                'quantity' => $item->qty,
                'price' => $item->price,
                'options' => $options,
            ]);
        }

        if ($request->payment == 'cash') {
            $order->update(['status' => OrderStatus::Pending]);
            LaraCart::destroyCart();
            notifyUser('success', 'Your order has been sent successfully.');

            return redirect('/');
        }

        // If order payment is stripe go to finish
        if ($request->payment === 'stripe') {
            return $this->stripe($order);
        }

        // If order payment is tap go to finish
        if ($request->payment === 'tap') {
            return $this->tap($order);
        }
    }

    private function stripe(Order $order)
    {
        foreach ($order->orderLines as $orderLine) {
            $this->lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $orderLine->product->name
                    ],
                    'unit_amount' => (int) $orderLine->price * 100,
                ],
                'quantity' => $orderLine->quantity,
            ];
        }

        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $session = \Stripe\Checkout\Session::create([
            'line_items' => $this->lineItems,
            'mode' => 'payment',
            'success_url' => route('success', parameters: ['order' => $order]),
            'cancel_url' => route('checkout'),
        ]);

        return redirect()->away($session->url);
    }

    private function tap(Order $order)
    {
        $subtotal = 0;

        $description = 'Order Items: ';
        foreach ($order->orderLines as $orderLine) {
            $description .= "{$orderLine->quantity}x {$orderLine->product->name}, ";
        }
        $description = rtrim($description, ', ');

        foreach ($order->orderLines as $orderLine) {
            $this->lineItems[] = [
                'product' => $orderLine->product->name,
                'unit_amount' => $orderLine->price * 100,
                'quantity' => $orderLine->quantity,
            ];

            $subtotal += $orderLine->price * $orderLine->quantity;
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('TAP_SK'),
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->post('https://api.tap.company/v2/charges/', [
                    'amount' => $subtotal,
                    'currency' => 'USD',
                    'customer_initiated' => true,
                    'threeDSecure' => true,
                    'save_card' => false,
                    'description' => $description,
                    'metadata' => $this->lineItems,
                    'receipt' => [
                        'email' => false,
                        'sms' => false,
                    ],
                    'reference' => [
                        'transaction' => 'txn_' . $order->code,
                        'order' => 'ord_' . $order->code,
                    ],
                    'customer' => [
                        'first_name' => 'Mamoun',
                        'middle_name' => 'test',
                        'last_name' => 'test',
                        'email' => 'test@test.test',
                        'phone' => [
                            'country_code' => 20,
                            'number' => 654681321,
                        ],
                    ],
                    'merchant' => [
                        'id' => '1234',
                    ],
                    'source' => [
                        'id' => 'src_all',
                    ],
                    'redirect' => [
                        'url' => route('success', ['order' => $order]),
                    ],
                ]);


        if ($response->successful()) {
            $url = $response->json()['transaction']['url'];
            return redirect()->away($url);
        } else {
            dd('Errors');
        }
    }

    public function success(Order $order)
    {
        $order->update([
            'status' => OrderStatus::Approved,
            'payment_status' => PaymentStatus::Completed,
        ]);

        LaraCart::destroyCart();

        notifyUser('success', 'Your order has been sent successfully.');

        return redirect('/');
    }

    public function cancel(Order $order)
    {
        $order->update([
            'status' => OrderStatus::Canceled,
            'payment_status' => PaymentStatus::Canceled,
        ]);

        notifyUser('danger', 'Something went wrong, please try again.');

        return redirect('/checkout');
    }

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

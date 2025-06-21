<x-layout>
    @push('css')
        <style>
            .cart-coupon {
                overflow: hidden;
            }

            .cart-coupon h4 {
                font-size: 18px;
                line-height: 13px;
                margin-bottom: 15px;
                font-weight: 600;
            }

            .cart-coupon p {
                font-size: 14px;
                line-height: 24px;
            }

            .cart-coupon .cuppon-form {
                position: relative;
                padding-right: 142px;
                max-width: 300px;
                width: 100%;
                border: 1px solid #ddd;
                float: left;
                border-radius: 50px;
            }

            .cart-coupon .cuppon-form input[type=text] {
                border: 1px solid transparent;
                float: left;
                font-size: 14px;
                height: 40px;
                max-width: 100%;
                padding: 7px 15px;
                width: 100%;
                border-radius: 50px;
            }

            .cart-coupon .cuppon-form a {
                /* background-color: #1a161e; */
                /* border: medium none; */
                /* color: #fff; */
                display: block;
                float: left;
                font-size: 14px;
                font-weight: 600;
                height: 40px;
                line-height: 24px;
                padding: 8px 25px;
                text-transform: uppercase;
                border-radius: 50px;
                position: absolute;
                right: 0;
                top: 0;
            }
        </style>
    @endpush
    @if (Session::has('message'))
        <x-alert>{{ Session::get('message') }}</x-alert>
    @endif
    <div class="section block-breadcrumb">
        <div class="container">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="/">Home </a></li>
                    <li><a href="#">Checkout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <section class="section block-cart">
        <div class="container mb-100 mt-60">
            <form action="/checkout" method="POST">
                @csrf
                <div class="row mt-20">
                    <div class="col-lg-6">
                        <div class="cart-coupon" x-data="{ show: false }">
                            <div class="cart-coupon">
                                <div class="box-gift-coupon account">
                                    Have a coupon? <a href="javascript:void(0);" x-on:click="show = true"
                                        x-show="!show">Click here to enter your code</a>
                                </div>
                                <div class="cuppon-form" x-show="show" x-transition.duration.200ms>
                                    <input type="text" name="coupon" id="couponInput" />
                                    <a id="applyCoupon" class="btn btn-outline-dark">Apply Coupon</a>
                                </div>
                            </div>
                        </div>
                        <div class="box-form-checkout form-comment">
                            <h4 class="mt-32 mb-25">Shipping address</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" for="towncity">Town / City *</label>
                                        <input class="form-control" name="city" id="towncity" type="text"
                                            value="{{ old('city') ?? ($shippingAddress->city ?? '') }}" required />
                                        @error('city')
                                            <p class="text-sm text-danger mt-1">{{ $errors->first() }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" for="address">Street Address *</label>
                                        <input class="form-control" name="street" id="address" type="text"
                                            value="{{ old('street') ?? ($shippingAddress->street ?? '') }}" required />
                                        @error('street')
                                            <p class="text-sm text-danger mt-1">{{ $errors->first() }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" for="apartment">Apartment, suite, unit, etc.
                                            (optional)</label>
                                        <input class="form-control" name="apartment" id="apartment" type="text"
                                            value="{{ old('apartment') ?? ($shippingAddress->apartment ?? '') }}" />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" for="phone">Phone *</label>
                                        <input class="form-control" name="phone" id="phone" type="text"
                                            value="{{ old('phone') ?? ($shippingAddress->phone ?? '') }}" required />
                                        @error('phone')
                                            <p class="text-sm text-danger mt-1">{{ $errors->first() }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" for="ordernote">Order Note (optional)</label>
                                        <textarea class="form-control" name="note" id="ordernote" rows="6"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="box-detail-cart">
                            <h4 class="mb-25">Your Order</h4>
                            <div class="box-info-cart">
                                <p class="text-17-medium text-uppercase">Product</p>
                                <div class="box-info-checkout-inner">
                                    <div class="list-items-cart">
                                        @foreach ($cartItems as $item)
                                            @php
                                                $product = App\Models\Product::find($item->id);
                                            @endphp
                                            <div class="item-cart">
                                                <div class="item-cart-image">
                                                    <img src="{{ $product ? $product->image_url : asset('assets/imgs/template/no-image.png') }}" alt="choun" />
                                                </div>
                                                <div class="item-cart-info">
                                                    <div class="item-cart-info-1">
                                                        <a class="text-17-medium"
                                                            href="{{ $product ? route('shop.show', $product->slug) : '#' }}">{{ $item->name }}
                                                            - x{{ $item->qty }}</a>
                                                        @if(isset($item->options[0]) && is_array($item->options[0]))
                                                            @foreach ($item->options[0] as $key => $value)
                                                            <p class="box-color">
                                                                <span class="body-p2 neutral-medium-dark">{{ ucfirst($key) }}:
                                                                </span><span class="body-p2 neutral-dark">{{ $value }}</span>
                                                            </p>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                    <div class="item-cart-info-2">
                                                        <p class="body-p2">
                                                            {{ Number::currency($item->price * $item->qty, 'USD') }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between box-border-bottom">
                                    <h5 class="neutral-medium-dark">Subtotal</h5>
                                    <div class="d-flex gap-4">
                                        <h5 id="subtotal" class="neutral-dark">
                                            {{ $subtotal }}
                                        </h5>
                                        <h5 id="discounted" class="neutral-dark"></h5>
                                    </div>
                                </div>
                                <div class="box-info-cart-inner">
                                    <p class="text-17-medium text-uppercase mb-15 neutral-medium-dark">
                                        Shipping
                                    </p>
                                    <div class="list-radio">
                                        <div class="item-radio">
                                            <label>
                                                <input type="radio" name="shipping" checked="checked" />Flat rate:
                                                $50.00 </label><span class="price-ship">$50.00</span>
                                        </div>
                                        <div class="item-radio">
                                            <label>
                                                <input type="radio" name="shipping" />Local pickup:
                                                $60.00
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between box-border-bottom">
                                    <h5 class="neutral-medium-dark">Total</h5>
                                    <h5 id="total" class="color-9">
                                        {{ $subtotal }}
                                    </h5>
                                </div>
                                <div class="box-other-link text-start box-border-bottom">
                                    <span class="text-17 link-green">Free shipping on orders over $200.00</span><a
                                        class="text-17" href="/shop">Continue Shopping</a>
                                </div>
                                <div class="box-payment-method">
                                    <p class="text-17-medium text-uppercase mb-15 neutral-medium-dark">
                                        Shipping
                                    </p>
                                    <div class="list-radio">
                                        <div class="item-radio">
                                            <label>
                                                <input type="radio" name="payment" value="cash"
                                                    checked="checked" />Cash on
                                                delivery
                                            </label>
                                            <p class="body-p2 neutral-medium-dark extra-info active">
                                                Please send a check to Store Name, Store Street,
                                                Store Town, Store State / County, Store Postcode.
                                            </p>
                                        </div>
                                        <div class="item-radio">
                                            <label>
                                                <input type="radio" name="payment" value="stripe" />Credit Card
                                                (Stripe)
                                            </label>
                                            <p class="body-p2 neutral-medium-dark extra-info">
                                                Please send a check to Store Name, Store Street,
                                                Store Town, Store State / County, Store Postcode.
                                            </p>
                                        </div>
                                        <div class="item-radio">
                                            <label>
                                                <input type="radio" name="payment" value="tap" />Credit Card
                                                (Tap)
                                            </label>
                                            <p class="body-p2 neutral-medium-dark extra-info">
                                                Please send a check to Store Name, Store Street,
                                                Store Town, Store State / County, Store Postcode.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-desc-checkout">
                                    <p class="body-p2 neutral-medium-dark mb-20">
                                        Your personal data will be used to process your order,
                                        support your experience throughout this website, and for
                                        other purposes described in our privacy policy.
                                    </p>
                                    <div class="form-group">
                                        <label>
                                            <input class="cb-left" type="checkbox" />I agree to
                                            the website <a href="#">terms and conditions *</a>
                                        </label>
                                    </div>
                                </div>
                                <div class="box-button-checkout">
                                    @guest
                                        <a class="account-icon account btn btn-black" href="#">
                                            Sign up first
                                        </a>
                                    @endguest
                                    @auth
                                        <button type="submit" class="btn btn-black" href="#">Place Order</button>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    @push('scripts')
        <script>
            $('#applyCoupon').click(function(e) {
                const code = $('#couponInput').val();
                $.ajax({
                    type: "POST",
                    url: "/checkout/apply-coupon",
                    data: {
                        'coupon': code,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        $('#discounted').html(
                            `$${data['price'].toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")}`);
                        $('#subtotal').css('text-decoration', 'line-through');
                        $('#total').html(
                            `$${data['total'].toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")}`);
                    },
                    error: function() {
                        $('#discounted').html('');
                        $('#subtotal').css('text-decoration', 'none');
                    }
                });
            })
        </script>
    @endpush
</x-layout>

<div class="box-popup-cart">
    <div class="box-cart-overlay"></div>
    <div class="box-cart-wrapper">
        <a class="btn-close-popup" href="#">
            <svg class="icon-16 d-inline-flex align-items-center justify-content-center" fill="#111111" stroke="#111111"
                width="24" height="24" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                </path>
            </svg>
        </a>
        <h5 class="mb-15">{{ count($cartItems) }} items</h5>
        <h5 class="mb-15">Subtotal: {{ Number::currency($subtotal, 'USD') }}</h5>
        <p class="body-p2">
            <span class="text-17-medium">Free Shipping</span>
            on orders over
            <span class="text-17-medium">$990.00</span>
        </p>
        <div class="box-progress-bar-block">
            <div class="progress">
                <div class="progress-bar" style="width: {{ $subtotal > 990 ? 100 : ($subtotal / 990) * 100 }}%"></div>
            </div>
        </div>
        <div class="box-products-cart">
            <div class="box-empty-cart d-none">
                <div class="icon-empty-cart">
                    <img src="assets/imgs/template/icons/empty-cart.svg" alt="choun">
                </div>
                <div class="info-empty-cart">
                    <p class="text-17 neutral-medium-dark">Your cart is empty</p>
                    <a class="link-underline" href="#">Add from Wishlist</a>
                </div>
            </div>
            <div class="list-items-cart">
                @foreach ($cartItems as $item)
                    <div class="item-cart">
                        <div class="item-cart-image"><img src="{{ '' }}" alt="choun"></div>
                        <div class="item-cart-info">
                            <div class="item-cart-info-1">
                                <a class="text-16-medium"
                                    href="{{ route('shop.show', App\Models\Product::find( collect($cartItems)->first()->id)->first()->slug) }}">{{ $item->name }}</a>
                                <div class="box-info-size-color-product">
                                    @foreach ($item->options[0] as $key => $value)
                                    <p class="box-color">
                                        <span class="body-p2 neutral-medium-dark">{{ ucfirst($key) }}:</span>
                                        <span class="body-p2 neutral-dark">{{ $value }}</span>
                                    </p>
                                    @endforeach
                                </div>
                                <p class="body-p2 d-block d-sm-none mb-8">{{ Number::currency($item->price, 'USD') }}</p>
                                <div class="box-form-cart">
                                    <div class="form-cart detail-qty"><span class="minus"></span>
                                        <input class="qty-val form-control" type="text" name="quantity"
                                            value="{{ $item->qty }}" min="1"><span class="plus"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="item-cart-info-2">
                                <p class="body-p2 d-none d-sm-block">{{ Number::currency($item->price * $item->qty) }}</p>
                                <a class="btn-remove-cart" href="#" wire:click.prevent="removeItem({{ $item->id }})" x-on:click="$wire.on('item-deleted-from-cart', (event) => showToast('success', event[0].message))"></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-between mt-25 mb-15">
            @if ($subtotal > 0)
                <h6 class="neutral-medium-dark">Subtotal</h6>
                <h6 class="neutral-dark">{{ Number::currency($subtotal) }}</h6>
            @endif
        </div>
        <div class="box-button-popup-cart d-flex align-items-center justify-content-between">
            <a class="btn btn-border w-100 mr-5" href="/cart">View Cart</a>
            <a class="btn btn-black w-100 ml-5" href="/checkout">Check Out</a>
        </div>
    </div>
</div>

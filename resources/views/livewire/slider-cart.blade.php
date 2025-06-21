<div class="box-popup-cart" x-data="{ 
    showToast: function(type, message) {
        if (typeof showToast === 'function') {
            showToast(type, message);
        }
    }
}" x-on:item-deleted-from-cart.window="showToast('success', $event.detail[0].message)"
   x-on:item-added-to-cart.window="showToast('success', $event.detail[0].message)">
    <div class="box-cart-overlay"></div>
    <div class="box-cart-wrapper">
        <a class="btn-close-popup" href="#">
            <svg class="icon-16 d-inline-flex align-items-center justify-content-center" fill="#111111" stroke="#111111"
                width="24" height="24" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                </path>
            </svg>
        </a>
        <h5 class="mb-15">{{ collect($cartItems)->sum('qty') }} items</h5>
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
            <div class="box-empty-cart {{ count($cartItems) > 0 ? 'd-none' : '' }}">
                <div class="icon-empty-cart">
                    <img src="assets/imgs/template/icons/empty-cart.svg" alt="choun">
                </div>
                <div class="info-empty-cart">
                    <p class="text-17 neutral-medium-dark">Your cart is empty</p>
                    <a class="link-underline" href="#">Add from Wishlist</a>
                </div>
            </div>
            <div class="list-items-cart {{ count($cartItems) === 0 ? 'd-none' : '' }}">
                @foreach ($cartItems as $item)
                    @php
                        $product = App\Models\Product::find($item->id);
                        $itemHash = $item->getHash();
                    @endphp
                    <div class="item-cart" wire:key="cart-item-{{ $itemHash }}">
                        <div class="item-cart-image">
                            <img src="{{ $product ? $product->image_url : asset('assets/imgs/template/no-image.png') }}" alt="choun">
                        </div>
                        <div class="item-cart-info">
                            <div class="item-cart-info-1">
                                <a class="text-16-medium"
                                    href="{{ route('shop.show', $product) }}">{{ $item->name }}</a>
                                <div class="box-info-size-color-product">
                                    @if(isset($item->options[0]) && is_array($item->options[0]))
                                        @foreach ($item->options[0] as $attributeSlug => $valueId)
                                            @php
                                                $attribute = App\Models\Attribute::where('slug', $attributeSlug)->first();
                                                $value = App\Models\AttributeValue::find($valueId);
                                            @endphp
                                            @if($attribute && $value)
                                                <p class="box-color">
                                                    <span class="body-p2 neutral-dark">{{ $attribute->name }}: </span>
                                                    <span class="body-p2 neutral-dark">{{ $value->name }}</span>
                                                </p>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                                <p class="body-p2 d-block d-sm-none mb-8">{{ Number::currency($item->price, 'USD') }}</p>
                                <div class="box-form-cart">
                                    <div class="form-cart detail-qty">
                                        <span class="minus" wire:click="updateQuantity('{{ $item->id }}', {{ max(1, $item->qty - 1) }})"></span>
                                        <input class="qty-val form-control" type="text" value="{{ $item->qty }}" min="1" 
                                               wire:change="updateQuantity('{{ $item->id }}', $event.target.value)"
                                               wire:key="qty-{{ $itemHash }}">
                                        <span class="plus" wire:click="updateQuantity('{{ $item->id }}', {{ $item->qty + 1 }})"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="item-cart-info-2">
                                <p class="body-p2 d-none d-sm-block">{{ Number::currency($item->price * $item->qty) }}</p>
                                <a class="btn-remove-cart" href="#" wire:click.prevent="removeItem({{ $item->id }})"></a>
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

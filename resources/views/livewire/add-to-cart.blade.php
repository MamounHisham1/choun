<div x-data="{ 
    quantity: @entangle('data.quantity'),
    showToast: function(type, message) {
        if (typeof showToast === 'function') {
            showToast(type, message);
        }
    }
}" x-on:item-added-to-cart.window="showToast('success', $event.detail[0].message)">
    <form method="POST" wire:submit="addToCart">
        @csrf
        @if($attributes->isNotEmpty())
            <div class="attributes-section mb-4">
                <h5 class="attributes-title mb-3" style="font-weight: 600; color: #1f2937; font-size: 1rem; margin-bottom: 16px;">
                    <i class="bi bi-sliders" style="margin-right: 6px; color: #4f46e5; font-size: 0.9rem;"></i>
                    Product Options
                </h5>
                @foreach ($attributes as $attribute)
                    <div class="block-color">
                        <span class="attribute-label">{{ $attribute->pivot->attribute->name }}:</span>
                        <div class="attribute-values d-flex flex-wrap gap-2 mt-2">
                            @foreach ($attribute->pivot->values as $value)
                                <x-forms.radio wire:model="data.attributes.{{ $attribute->pivot->attribute->slug }}"
                                    value="{{ $value->id }}" name="attribute_{{ $attribute->pivot->attribute->slug }}">
                                    {{ $value->name }}
                                </x-forms.radio>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <div class="block-quantity">
            <div class="text-17 neutral-medium-dark mb-10">
                Quantity
            </div>
            <div class="box-form-cart">
                <div class="form-cart detail-qty">
                    <span class="minus" x-on:click="if(quantity > 1) quantity--"></span>
                    <input class="qty-val form-control" id="qty" type="text" x-model="quantity" min="1" />
                    <span class="plus" x-on:click="quantity++"></span>
                </div>
                <button type="submit" class="btn btn-black">Add to Cart</button>
                <button class="btn btn-navy">Buy Now</button>
                <a class="btn btn-wishlist" href="#">
                    <svg class="d-inline-flex align-items-center justify-content-center" width="28" height="28"
                        viewbox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_116_452)">
                            <path
                                d="M14.001 6.52898C16.35 4.41998 19.98 4.48998 22.243 6.75698C24.505 9.02498 24.583 12.637 22.479 14.993L13.999 23.485L5.52101 14.993C3.41701 12.637 3.49601 9.01898 5.75701 6.75698C8.02201 4.49298 11.645 4.41698 14.001 6.52898ZM20.827 8.16998C19.327 6.66798 16.907 6.60698 15.337 8.01698L14.002 9.21498L12.666 8.01798C11.091 6.60598 8.67601 6.66798 7.17201 8.17198C5.68201 9.66198 5.60701 12.047 6.98001 13.623L14 20.654L21.02 13.624C22.394 12.047 22.319 9.66498 20.827 8.16998Z"
                                fill=""></path>
                        </g>
                        <defs>
                            <clippath id="clip0_116_452">
                                <rect width="24" height="24" fill="white" transform="translate(2 2)">
                                </rect>
                            </clippath>
                        </defs>
                    </svg>
                </a>
            </div>
        </div>
    </form>
</div>

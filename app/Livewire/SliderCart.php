<?php

namespace App\Livewire;

use App\Models\AttributeValue;
use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\Component;
use LukePOLO\LaraCart\Facades\LaraCart;

class SliderCart extends Component
{
    #[On('item-added-to-cart')]
    public function render()
    {
        $cartItems = LaraCart::getItems();
        foreach($cartItems as $item) {
            foreach($item->options[0] as $key => $value) {
                $attributeValue = AttributeValue::find($value);
                $item->options[0][$key] = $attributeValue?->name ?? $value;
            }
        }
        $subtotal = LaraCart::total($formatted = false);

        return view('livewire.slider-cart', [
            'cartItems' => $cartItems,
            'subtotal' => $subtotal,
        ]);
    }

    public function removeItem($itemId)
    {
        $attributes = Product::find($itemId)->attributes()->pluck('name')->toArray();
        $items = LaraCart::find(['id' => $itemId]);
        if(is_array($items)) {
            foreach($items as $key => $item) {
                dd($key);
                if($attributes[$key] === $item->options[0][lcfirst($attributes[$key])]) {
                    dump($item);   
                }
            }
        } else {
            dump($items);
        }
        dd($items);
        LaraCart::removeItem($items->getHash());

        $this->dispatch('item-deleted-from-cart', ['message' => 'Item deleted from cart']);
        return response("Added to cart", 200);
    }

}

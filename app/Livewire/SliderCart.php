<?php

namespace App\Livewire;

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
        $subtotal = LaraCart::total($formatted = false);

        return view('livewire.slider-cart', [
            'cartItems' => $cartItems,
            'subtotal' => $subtotal,
        ]);
    }

    public function removeItem($item)
    {
        $item = LaraCart::find(['id' => $item]);
        LaraCart::removeItem($item->getHash());

        $this->dispatch('item-deleted-from-cart', ['message' => 'Item deleted from cart']);
        return response("Added to cart", 200);
    }
}

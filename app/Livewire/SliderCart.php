<?php

namespace App\Livewire;

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
}

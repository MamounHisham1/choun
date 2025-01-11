<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use LukePOLO\LaraCart\Facades\LaraCart;

class ItemsCount extends Component
{
    #[On('item-added-to-cart')]
    public function render()
    {
        $cartItems = LaraCart::getItems();
        return view('livewire.items-count', [
            'cartItems' => $cartItems,
        ]);
    }
}

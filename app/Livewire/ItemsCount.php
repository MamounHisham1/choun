<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use LukePOLO\LaraCart\Facades\LaraCart;

class ItemsCount extends Component
{
    #[On('item-added-to-cart'), On('item-deleted-from-cart'), On('cart-quantity-updated')]
    public function render()
    {
        $cartItems = LaraCart::getItems();
        $totalItems = 0;
        
        foreach ($cartItems as $item) {
            $totalItems += $item->qty;
        }
        
        return view('livewire.items-count', [
            'cartItems' => $cartItems,
            'totalItems' => $totalItems,
        ]);
    }
}

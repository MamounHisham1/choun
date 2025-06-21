<?php

namespace App\Livewire;

use App\Models\AttributeValue;
use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\Component;
use LukePOLO\LaraCart\Facades\LaraCart;

class SliderCart extends Component
{
    #[On('item-added-to-cart'), On('item-deleted-from-cart')]
    public function render()
    {
        $cartItems = LaraCart::getItems();
        $subtotal = LaraCart::total($formatted = false);

        return view('livewire.slider-cart', [
            'cartItems' => $cartItems,
            'subtotal' => $subtotal,
        ]);
    }

    public function removeItem($itemId)
    {
        $items = LaraCart::find(['id' => $itemId]);
        if ($items) {
            if (is_array($items)) {
                foreach($items as $item) {
                    LaraCart::removeItem($item->getHash());
                }
            } else {
                LaraCart::removeItem($items->getHash());
            }
        }

        $this->dispatch('item-deleted-from-cart', ['message' => 'Item deleted from cart']);
    }

    public function updateQuantity($itemId, $quantity)
    {
        if ($quantity < 1) return;
        
        $item = LaraCart::find(['id' => $itemId]);
        if ($item && !is_array($item)) {
            LaraCart::updateItem($item->getHash(), 'qty', $quantity);
            $this->dispatch('cart-quantity-updated', ['message' => 'Cart updated']);
        }
    }
}

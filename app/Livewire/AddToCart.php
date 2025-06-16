<?php

namespace App\Livewire;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Product;
use Livewire\Component;
use LukePOLO\LaraCart\Facades\LaraCart;

class AddToCart extends Component
{
    public ?array $data = [];

    public Product $product;

    public function mount()
    {
        $this->data['quantity'] = 1;
        
        $attributes = $this->product->attributes;
        foreach ($attributes as $attribute) {
            $attribute->pivot->attribute = Attribute::find($attribute->pivot->attribute_id);
            $attribute->pivot->values = AttributeValue::find(json_decode($attribute->pivot->values));
            $this->data['attributes'][$attribute->pivot->attribute->slug] = $attribute->pivot->values[0]->id;
        }
    }

    public function render()
    {
        $attributes = $this->product->attributes;
        $attributes->map(function ($attribute) {
            $attribute->pivot->attribute = Attribute::find($attribute->pivot->attribute_id);
            $attribute->pivot->values = AttributeValue::find(json_decode($attribute->pivot->values));
        });
        return view('livewire.add-to-cart', [
            'attributes' => $attributes,
        ]);
    }

    public function addToCart()
    {
        $cartItems = LaraCart::getItems();
        $existingItem = null;
        
        foreach ($cartItems as $item) {
            if ($item->id == $this->product->id) {
                $itemOptions = $item->options ?? [];
                $currentAttributes = $this->data['attributes'] ?? [];
                
                if (isset($itemOptions[0]) && is_array($itemOptions[0])) {
                    $itemAttributes = $itemOptions[0];
                } else {
                    $itemAttributes = [];
                }
                
                if ($this->attributesMatch($itemAttributes, $currentAttributes)) {
                    $existingItem = $item;
                    break;
                }
            }
        }
        
        if ($existingItem) {
            $newQuantity = $existingItem->qty + $this->data['quantity'];
            LaraCart::updateItem($existingItem->getHash(), 'qty', $newQuantity);
        } else {
            LaraCart::add(
                $this->product->id,
                $this->product->name,
                $this->data['quantity'],
                $this->product->price,
                $this->data['attributes'] ?? []
            );
        }
        
        $this->dispatch('item-added-to-cart', ['message' => 'Item added to cart']);
    }
    
    private function attributesMatch($itemAttributes, $currentAttributes)
    {
        if (count($itemAttributes) !== count($currentAttributes)) {
            return false;
        }
        
        foreach ($currentAttributes as $key => $value) {
            if (!isset($itemAttributes[$key]) || $itemAttributes[$key] != $value) {
                return false;
            }
        }
        
        return true;
    }
}

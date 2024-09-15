<?php

namespace App\Livewire;

use App\Models\Attribute;
use App\Models\AttributeValue;
use Livewire\Component;

class AddToCart extends Component
{
    public function render()
    {
        $product = session()->get('product');
        $attributes = $product->attributes;
        $attributes->map(function($attribute) {
            $attribute->pivot->attribute_id = Attribute::find($attribute->pivot->attribute_id);
            $attribute->pivot->values = AttributeValue::find(json_decode($attribute->pivot->values));
        });
        return view('livewire.add-to-cart', [
            'product' => $product,
            'attributes' => $attributes,
        ]);
    }

    public function test()
    {
        
        dd('am i here?');
    }
}

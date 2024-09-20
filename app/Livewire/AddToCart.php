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
    }

    public function render()
    {
        $attributes = $this->product->attributes;
        $attributes->map(function ($attribute) {
            $attribute->pivot->attribute = Attribute::find($attribute->pivot->attribute_id);
            $attribute->pivot->values = AttributeValue::find(json_decode($attribute->pivot->values));
            $this->data['attributes'][$attribute->slug] = $attribute->pivot->values[0]->id;
        });
        return view('livewire.add-to-cart', [
            'attributes' => $attributes,
        ]);
    }

    public function addToCart()
    {
        // dd($this->data);
        LaraCart::add(
            $this->product->id,
            $this->product->name,
            $this->data['quantity'],
            $this->product->price,
            [$this->data['attributes'] ?? null],
        );

        return response("Added to cart", 200);
    }
}

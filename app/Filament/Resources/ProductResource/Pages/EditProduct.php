<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Models\Product;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    public function afterFill()
    {  
        $product = Product::find($this->data['id']);
        $test = [];
        foreach($product->attributes as $attribute) {
            $test[] = [
                'product_id' => $attribute->pivot->product_id,
                'attribute_id' => $attribute->pivot->attribute_id,
                'values' => json_decode($attribute->pivot->values),
            ];
        }
        $this->data['attributes'] = $test;
        return $this->data;
    }
}

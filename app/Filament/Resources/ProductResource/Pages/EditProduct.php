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
            // Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    public function afterFill()
    {
        $product = Product::find($this->data['id']);
        $attributes = [];
        foreach ($product->attributes as $attribute) {
            $attributes[] = [
                'product_id' => $attribute->pivot->product_id,
                'attribute_id' => $attribute->pivot->attribute_id,
                'values' => json_decode($attribute->pivot->values),
            ];
        }
        $this->data['attributes'] = $attributes;
        return $this->data;
    }

    public function mutateFormDataBeforeSave(array $data): array
    {
        $product = $this->getRecord();
        $product->attributes()->sync([]);
        foreach ($data['attributes'] as $attribute) {
            $product->attributes()->attach($attribute['attribute_id'], [
                'values' => json_encode($attribute['values'])
            ]);
        }
        unset($data['attributes']);
        return $data;
    }
}

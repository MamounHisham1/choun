<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    public function 
    BeforeCreate(array $data): array
    {
        session()->flash('attributes', $data['attributes']);
        unset($data['attributes']);

        return $data;
    }

    public function afterCreate()
    {
        $product = $this->getRecord();
        foreach (session('attributes') as $attribute) {
            $product->attributes()->attach($attribute['attribute_id'], [
                'values' => json_encode($attribute['values'])
            ]);
        }
    }
}

<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Models\ShippingAddress;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;

    public function mutateFormDataBeforeCreate(array $data): array
    {
        $data['shipping_address_id'] = ShippingAddress::create($this->form->getRawState()['shippingAddress'])->id;
        $orderLines = $this->form->getRawState()['orderLines'];
        $total = collect($orderLines)->map(fn($orderLine) => $orderLine['price'] * $orderLine['quantity'])->sum();
        $data['total'] = $total;
        return $data;
    }
}

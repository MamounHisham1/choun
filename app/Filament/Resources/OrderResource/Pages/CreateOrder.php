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
        $orderLines = $this->form->getRawState()['orderLines'];
        $total = collect($orderLines)->map(fn($orderLine) => $orderLine['price'] * $orderLine['quantity'])->sum();
        $data['total'] = $total;

        if (! $data['returning_customer?']) {
            $data['shipping_address_id'] = ShippingAddress::create($this->form->getRawState()['shippingAddress'])->id;
            return $data;
        }
        return $data;
    }
}

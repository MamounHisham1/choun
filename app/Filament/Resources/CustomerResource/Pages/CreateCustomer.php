<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateCustomer extends CreateRecord
{
    protected static string $resource = CustomerResource::class;

    public function mutateFormDataBeforeCreate(array $data): array
    {
        // dd('am i here?');
        $data['password'] = Str::password(16, symbols: false);
        return $data;
    }
}

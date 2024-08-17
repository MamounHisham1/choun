<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use App\Models\HomeSetting;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSettings extends ListRecords
{
    protected static string $resource = SettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->mutateFormDataUsing(function ($data) {
                foreach($data['content'] as $content) {
                    $json = $content['data'];
                }
                dd();
                unset($data['content']);
                return [
                    'key' => 'offer',
                    'json_value' => $json,
                ];
            }),
        ];
    }
}

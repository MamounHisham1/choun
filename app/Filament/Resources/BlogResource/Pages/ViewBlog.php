<?php

namespace App\Filament\Resources\BlogResource\Pages;

use App\Filament\Resources\BlogResource;
use Filament\Actions;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;

class ViewBlog extends ViewRecord
{
    protected static string $resource = BlogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->columns(2)
            ->schema([
                TextEntry::make('is_published')
                    ->hiddenLabel()
                    ->badge()
                    ->getStateUsing(fn($record) => $record->is_published ? 'Published' : 'Draft')
                    ->color(fn($record) => $record->is_published ? 'success' : 'primary')
                    ->columnSpanFull(),
                TextEntry::make('title'),
                TextEntry::make('category.name'),
                TextEntry::make('content')
                    ->html()
                    ->columnSpanFull(),
                ImageEntry::make('image_url')
                    ->label('Image')
                    ->columnSpanFull()
                    ->width('100%')
                    ->height('100%'),
            ]);
    }
}


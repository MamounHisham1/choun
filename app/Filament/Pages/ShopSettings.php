<?php

namespace App\Filament\Pages;

use App\Models\HomeSetting;
use App\Models\Product;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class ShopSettings extends Page
{
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.shop-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(HomeSetting::get()->last()['json_value']);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Offer')->schema([
                    TextInput::make('message')
                    ->required(),
                    Select::make('product')
                    ->options(Product::get()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                    ])
                    ->columns(2),
            ])
            ->statePath('data');
    }

    public function create(): void
    {
        $content = $this->form->getState();
        HomeSetting::updateOrCreate(['key' => 'offer'], [
            'json_value' => $content,
        ]);
        Notification::make()->success()->title('Saved')->send();
    }
}

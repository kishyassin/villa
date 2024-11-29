<?php

namespace App\Filament\Resources\VillaResource\Pages;

use App\Filament\Resources\VillaResource;
use Filament\Actions;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Pages\EditRecord;

class EditVilla extends EditRecord
{
    protected static string $resource = VillaResource::class;

    // Méthode non statique pour correspondre à la classe parente
    public function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nom de la villa')
                    ->required()
                    ->maxLength(255),

                TextInput::make('ville')
                    ->label('ville')
                    ->required()
                    ->maxLength(150),

                TextInput::make('price')
                    ->label('Prix')
                    ->numeric()
                    ->required(),

                Textarea::make('description')
                    ->label('Description')
                    ->rows(4)
                    ->required(),

                TextInput::make('location')
                    ->label('Localisation')
                    ->required(),

                TextInput::make('rooms')
                    ->label('Nombre de chambres')
                    ->numeric()
                    ->required(),

                TextInput::make('bathrooms')
                    ->label('Nombre de salles de bains')
                    ->numeric()
                    ->required(),

                TextInput::make('area')
                    ->label('Surface (m²)')
                    ->numeric()
                    ->required(),

                Toggle::make('is_available')
                    ->label('Disponible ?')
                    ->inline(false),
            ]);
    }

    protected function getActions(): array
    {
        return [
        ];
    }
}

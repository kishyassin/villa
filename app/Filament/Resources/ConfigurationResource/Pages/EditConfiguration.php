<?php

namespace App\Filament\Resources\ConfigurationResource\Pages;

use App\Filament\Resources\ConfigurationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

class EditConfiguration extends EditRecord
{
    protected static string $resource = ConfigurationResource::class;

    public function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('title')
                    ->required()
                    ->maxLength(255),

                TextInput::make('addresse')
                    ->label('addresse')
                    ->required(),

                TextInput::make('mail')
                    ->label('mail')
                    ->email()
                    ->placeholder('Entrez une adresse e-mail valide') // Ajoute un placeholder
                    ->helperText('Veuillez saisir une adresse e-mail valide.')
                    ->required(),

                TextInput::make('phone')
                    ->label('Téléphone')
                    ->required()
                    ->placeholder('Entrez un numéro de téléphone valide')
                    ->helperText('Format : 06 89 68 62 89')
                    ->maxLength(15)

            ]);
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListConfigurations::route('/'),
            'edit' => Pages\EditConfiguration::route('/{record}/edit'),
        ];
    }
}

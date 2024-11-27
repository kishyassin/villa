<?php

namespace App\Filament\Resources;
use Filament\Tables\Table;
use App\Filament\Resources\VillaResource\Pages;
use App\Models\Villa;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
 // Make sure this is included

class VillaResource extends Resource
{
    protected static ?string $model = Villa::class;

    protected static ?string $navigationLabel = 'Villas';
    protected static ?string $navigationIcon = 'heroicon-o-home';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVillas::route('/'),
            'edit' => Pages\EditVilla::route('/{record}/edit'),
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('id')->toggleable(),
                TextColumn::make('name')->label('Nom de la villa'),
                TextColumn::make('location')->label('location')->words(2),
                TextColumn::make('ville')->label('ville')->searchable(),
                TextColumn::make('price')->label('Prix'),
                TextColumn::make('description')->label('Description')->words(2),
                TextColumn::make('rooms')->label("rooms"),
                TextColumn::make('bathrooms')->label("bathrooms"),
                TextColumn::make('area')->label("area"),
                TextColumn::make('is_available')->label("is_available")->formatStateUsing(fn ($state) => $state ? ' Oui' : ' Non'),
            ])

            ->filters([
                // Add filters if needed
            ])
            ->actions([
                // Add actions if needed
            ]);
    }
    public static function relationManagers(): array
    {
        return [
            'images' => VillaImagesRelationManager::class, // Assurez-vous que c'est le bon chemin
        ];
    }
}

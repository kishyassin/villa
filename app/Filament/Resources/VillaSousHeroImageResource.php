<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VillaSousHeroImageResource\Pages;
use App\Filament\Resources\VillaSousHeroImageResource\RelationManagers;
use App\Models\VillaSousHeroImage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Actions\DeleteAction;



class VillaSousHeroImageResource extends Resource
{
    protected static ?string $model = VillaSousHeroImage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image_path_sous_hero')
                    ->label('Images Sous-Hero')
                    ->multiple() // Permet plusieurs images
                    ->maxFiles(2), // Limité à 2 images

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            ImageColumn::make('image_path_sous_hero')
            ->label('Image Hero')
            ->size(50), // Taille de l'aperçu
        ])
            ->filters([
                //
            ])
            ->actions([
                DeleteAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVillaSousHeroImages::route('/'),
            'create' => Pages\CreateVillaSousHeroImage::route('/create'),
            'edit' => Pages\EditVillaSousHeroImage::route('/{record}/edit'),
        ];
    }
}

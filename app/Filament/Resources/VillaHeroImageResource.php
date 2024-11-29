<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VillaHeroImageResource\Pages;
use App\Filament\Resources\VillaHeroImageResource\RelationManagers;
use App\Models\VillaHeroImage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Actions\DeleteAction;


class VillaHeroImageResource extends Resource
{
    protected static ?string $model = VillaHeroImage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image_path_hero')
                ->label('Image Hero')
                ->maxFiles(1),  // Taille de l'aperçu
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path_hero')
                ->label('Image Hero')
                ->size(50), // Taille de l'aperçu
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
            'index' => Pages\ListVillaHeroImages::route('/'),
            'create' => Pages\CreateVillaHeroImage::route('/create'),
            'edit' => Pages\EditVillaHeroImage::route('/{record}/edit'),
        ];
    }
}

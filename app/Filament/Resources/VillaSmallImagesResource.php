<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VillaSmallImagesResource\Pages;
use App\Filament\Resources\VillaSmallImagesResource\RelationManagers;
use App\Models\VillaSmallImages;
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

class VillaSmallImagesResource extends Resource
{
    protected static ?string $model = VillaSmallImages::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image_path_small_image')
                    ->label('Images Small images')
                    ->directory('small_images')
                    ->multiple(), // Permet plusieurs images // Limité à 2 images
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                    ImageColumn::make('image_path_small_image')
                    ->label('Image Hero')
                    ->size(50), // Taille de l'aperçu
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListVillaSmallImages::route('/'),
            'create' => Pages\CreateVillaSmallImages::route('/create'),
            'edit' => Pages\EditVillaSmallImages::route('/{record}/edit'),
        ];
    }
}

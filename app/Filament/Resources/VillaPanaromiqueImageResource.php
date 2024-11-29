<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VillaPanaromiqueImageResource\Pages;
use App\Filament\Resources\VillaPanaromiqueImageResource\RelationManagers;
use App\Models\VillaPanaromiqueImage;
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

class VillaPanaromiqueImageResource extends Resource
{
    protected static ?string $model = VillaPanaromiqueImage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image_path_panoramique')
                    ->label('Image Panoramique')
                    ->maxFiles(1), // Une seule image
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path_panoramique')
                ->label('Image Panoramique')
                ->size(50),
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
            'index' => Pages\ListVillaPanaromiqueImages::route('/'),
            'create' => Pages\CreateVillaPanaromiqueImage::route('/create'),
            'edit' => Pages\EditVillaPanaromiqueImage::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SquareImageResource\Pages;
use App\Filament\Resources\SquareImageResource\RelationManagers;
use App\Models\SquareImage;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SectionResource;

class SquareImageResource extends Resource
{
    protected static ?string $model = squareImage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Gestion des Images';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('squareimagespath')
                    ->label('Image Carrée')
                    ->disk('public')
                    ->directory('images/squares')
                    ->enableReordering() // Permet de réorganiser les images
                    ->preserveFilenames()
                    ->image()
                    ->nullable(),
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('squareimagespath')
                ->label('Image Carrée')
                ->disk('public'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSquareImages::route('/'),
            'edit' => Pages\EditSquareImage::route('/{record}/edit'),
        ];
    }
}

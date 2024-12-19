<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LargeImageResource\Pages;
use App\Filament\Resources\LargeImageResource\RelationManagers;
use App\Models\LargeImage;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms;
use Filament\Forms\Form;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use App\Filament\Resources\SectionResource;

class LargeImageResource extends Resource
{
    protected static ?string $model = largeImage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Gestion des Images';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('largeimagepath')
                ->label('Grande Image Hero')
                ->disk('public')
                ->directory('images/larges')
                ->image()
                ->enableReordering()
                ->preserveFilenames() // Conserve le nom du fichier
                ->nullable(),
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('largeimagepath')
                    ->label('Grande Image Hero')
                    ->disk('public'),

                 // Permet de ne pas écraser si vide
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(), // Replacing DeleteAction with EditAction
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
            'index' => Pages\ListLargeImages::route('/'),
            'edit' => Pages\EditLargeImage::route('/{record}/edit'),
        ];
    }
}

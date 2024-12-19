<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PanaromaImageResource\Pages;
use App\Filament\Resources\PanaromaImageResource\RelationManagers;
use App\Models\panaromaImage;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Section;
use Filament\Resources\Resource;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PanaromaImageResource extends Resource
{
    protected static ?string $model = panaromaImage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Gestion des Images';

    public static function form(Form $form): Form
    {
        return $form
                ->schema([
                FileUpload::make('panaromaimagepath')
                    ->label('Image Panorama')
                    ->disk('public')
                    ->directory('images/panoramas')
                    ->enableReordering() // Permet de réorganiser les images
                    ->preserveFilenames()
                    ->image()
                    ->nullable()
                    ->rules('max:10240'),
                ]);        
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('panaromaimagepath')
                    ->label('Image Panorama')
                    ->disk('public'),
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPanaromaImages::route('/'),
            'edit' => Pages\EditPanaromaImage::route('/{record}/edit'),
        ];
    }
}

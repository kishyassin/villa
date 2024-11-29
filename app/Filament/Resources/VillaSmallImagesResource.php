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
use Filament\Forms\Components\Repeater;



class VillaSmallImagesResource extends Resource
{
    protected static ?string $model = VillaSmallImages::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Repeater::make('image_path_small_image')
                    ->label('Petites Images')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Petite Image')
                            ->maxFiles(5) // Vous pouvez ajuster ce nombre selon vos besoins
                            ->multiple(), // Permet plusieurs fichiers
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('image_path_small_image')
                    ->label('Petites Images')
                    ->getStateUsing(fn ($record) => is_array($record->image_path_petit_image)
                    ? implode(', ', $record->image_path_sous_hero) // Si c'est un tableau, on l'implose
                    : $record->image_path_sous_hero),
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

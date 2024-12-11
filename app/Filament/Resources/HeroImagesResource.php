<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroImagesResource\Pages;
use App\Filament\Resources\HeroImagesResource\RelationManagers;
use App\Models\HeroImages;
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

class HeroImagesResource extends Resource
{
    protected static ?string $model = HeroImages::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Gestion des Images';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('heroimagepath')
                ->label('Image Hero')
                ->disk('public')
                ->directory('images/heroes')
                ->image() // Supporte plusieurs image // Conserve le nom du fichier
                ->nullable(),
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('heroimagepath')
                    ->label('Image Hero')
                    ->disk('public'),
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(), // Replace EditAction with DeleteAction
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHeroImages::route('/'),
            'create' => Pages\CreateHeroImages::route('/create'),
        ];
    }
}

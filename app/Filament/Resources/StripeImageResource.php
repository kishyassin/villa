<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StripeImageResource\Pages;
use App\Filament\Resources\StripeImageResource\RelationManagers;
use App\Models\StripeImage;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SectionResource;
class StripeImageResource extends Resource
{
    protected static ?string $model = StripeImage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Gestion des Images';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('stripeimagepath')
                ->label('Image stripe')
                ->disk('public')
                ->directory('images/stripe')
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
                ImageColumn::make('stripeimagepath')
                ->label('Image Stripe')
                ->disk('public'),
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStripeImages::route('/'),
            'edit' => Pages\EditStripeImage::route('/{record}/edit'),
        ];
    }
}

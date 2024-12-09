<?php
namespace App\Filament\Resources;

use App\Filament\Resources\ImagesResource\Pages;
use App\Models\Images;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\ImageEntry;
use Illuminate\Database\Eloquent\Builder;

class ImagesResource extends Resource
{
    protected static ?string $model = Images::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // Form to handle image inputs and updates
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('heroImage')
                    ->label('Hero Image')
                    ->json()
                    ->required(),
                Forms\Components\TextInput::make('squareImage')
                    ->label('Square Image')
                    ->json()
                    ->required(),
                Forms\Components\TextInput::make('panoramaImage')
                    ->label('Panorama Image')
                    ->json()
                    ->required(),
                Forms\Components\TextInput::make('largeHeroImage')
                    ->label('Large Hero Image')
                    ->json()
                    ->required(),
            ]);
    }

    // Table to display image data
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                Tables\Columns\TextColumn::make('heroImage')
                    ->label('Hero Image')
                    ->formatStateUsing(function ($state) {
                        // Decode the JSON data and show the first image URL
                        $heroImage = json_decode($state, true);
                        return $heroImage[0] ?? 'No Image';
                    })
                    ->url(), // This displays the first URL as a clickable link
                Tables\Columns\TextColumn::make('squareImage')
                    ->label('Square Image')
                    ->formatStateUsing(function ($state) {
                        $squareImage = json_decode($state, true);
                        return $squareImage[0] ?? 'No Image';
                    })
                    ->url(),
                Tables\Columns\TextColumn::make('panoramaImage')
                    ->label('Panorama Image')
                    ->formatStateUsing(function ($state) {
                        $panoramaImage = json_decode($state, true);
                        return $panoramaImage[0] ?? 'No Image';
                    })
                    ->url(),
                Tables\Columns\TextColumn::make('largeHeroImage')
                    ->label('Large Hero Image')
                    ->formatStateUsing(function ($state) {
                        $largeHeroImage = json_decode($state, true);
                        return $largeHeroImage[0] ?? 'No Image';
                    })
                    ->url(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]); // Remove bulk actions
    }

    // Restrict to a specific record (optional)
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('id', 1); // Example: Restrict to a single row
    }

    // Pages for listing and editing images
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListImages::route('/'),
            'edit' => Pages\EditImages::route('/{record}/edit'),
        ];
    }

    // Use Infolist for displaying the image details in read-only mode
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                // Display hero image as an image entry
                ImageEntry::make('heroImage')
                    ->label('Hero Image')
                    ->default(function ($record) {
                        // Decode the JSON and get the first URL
                        $heroImage = json_decode($record->heroImage, true);
                        return $heroImage[0] ?? '';  // Adjust if needed
                    })
                    ->image(),

                // Display square image as an image entry
                ImageEntry::make('squareImage')
                    ->label('Square Image')
                    ->default(function ($record) {
                        $squareImage = json_decode($record->squareImage, true);
                        return $squareImage[0] ?? '';  // Adjust if needed
                    })
                    ->image(),

                // Display panorama image as an image entry (if available)
                ImageEntry::make('panoramaImage')
                    ->label('Panorama Image')
                    ->default(function ($record) {
                        $panoramaImage = json_decode($record->panoramaImage, true);
                        return $panoramaImage[0] ?? '';  // Adjust if needed
                    })
                    ->image(),

                // Display large hero image as an image entry (if available)
                ImageEntry::make('largeHeroImage')
                    ->label('Large Hero Image')
                    ->default(function ($record) {
                        $largeHeroImage = json_decode($record->largeHeroImage, true);
                        return $largeHeroImage[0] ?? '';  // Adjust if needed
                    })
                    ->image(),
            ]);
    }
}

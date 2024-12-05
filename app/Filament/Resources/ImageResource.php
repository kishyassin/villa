<?php
namespace App\Filament\Resources;

use App\Filament\Resources\ImageResource\Pages;
use App\Models\Images;
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

class ImageResource extends Resource
{
    protected static ?string $model = Images::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?string $navigationLabel = 'Gestion des images';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('largeHeroImage')
                    ->label('Grande Image Hero')
                    ->disk('public')
                    ->directory('images/heroes')
                    ->image(),

                FileUpload::make('heroImage')
                    ->label('Image Hero')
                    ->disk('public')
                    ->directory('images/heroes')
                    ->image()
                    ->multiple(),

                FileUpload::make('panoramaImage')
                    ->label('Image Panorama')
                    ->disk('public')
                    ->directory('images/panoramas')
                    ->image(),

                FileUpload::make('squareImage')
                    ->label('Image Carrée')
                    ->disk('public')
                    ->directory('images/squares')
                    ->image(),
            ]);
    }

    public static function afterCreate(Images $image, array $data): void
    {
        // Après la création de l'image, on enregistre les chemins des images sous forme de JSON
        $image->largeHeroImage = $data['largeHeroImage']->store('images/heroes', 'public');
        $image->heroImage = json_encode(array_map(function ($image) {
            return $image->store('images/heroes', 'public');
        }, $data['heroImage']));

        $image->panoramaImage = $data['panoramaImage']->store('images/panoramas', 'public');
        $image->squareImage = $data['squareImage']->store('images/squares', 'public');

        $image->save();
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('largeHeroImage')
                    ->label('Grande Image Hero')
                    ->disk('public'),

                ImageColumn::make('heroImage')
                    ->label('Image Hero')
                    ->disk('public'),

                Tables\Columns\ImageColumn::make('panoramaImage')
                    ->label('Image Panorama')
                    ->disk('public'),

                ImageColumn::make('squareImage')
                    ->label('Image Carrée')
                    ->disk('public'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListImages::route('/'),
            'edit' => Pages\EditImage::route('/{record}/edit'),
        ];
    }
}

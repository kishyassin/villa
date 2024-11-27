<?php

namespace App\Filament\Resources\VillaResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

class VillaImagesRelationManager extends RelationManager
{
    protected static string $relationship = 'images'; // Le nom de la relation dans le modèle Villa

    public function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                // Le champ pour uploader les images
                FileUpload::make('image_path')
                    ->label('Image de la villa')
                    ->image() // Assurez-vous que ce champ accepte des images
                    ->directory('villa-images') // Dossier où les images seront stockées
                    ->required(),
            ]);
    }

    public function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                // Affichage des images
                ImageColumn::make('image_path')
                    ->label('Image')
                    ->size(50), // Taille de l'image dans la table
            ])
            ->filters([
                // Filtre si nécessaire
            ])
            ->headerActions([
                // Ajouter une action pour créer une nouvelle image
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                // Ajouter des actions pour éditer ou supprimer des images
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Ajouter des actions groupées si nécessaire
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(), // Supprimer les images en masse
                ]),
            ]);
    }
}

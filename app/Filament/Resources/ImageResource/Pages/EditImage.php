<?php
namespace App\Filament\Resources\ImageResource\Pages;

use App\Filament\Resources\ImageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditImage extends EditRecord
{
    protected static string $resource = ImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }

    /**
     * Formate les données avant de les remplir dans le formulaire.
     */
    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Traitez les données de 'heroImage' (et autres images si nécessaire)
        if (isset($data['heroImage']) && is_string($data['heroImage'])) {
            // Si 'heroImage' est une chaîne JSON, on la décode en tableau
            $data['heroImage'] = json_decode($data['heroImage'], true) ?: [];
        }

        // Traitez les autres images de manière similaire
        $data['largeHeroImage'] = $data['largeHeroImage'] ?? null;
        $data['panoramaImage'] = $data['panoramaImage'] ?? null;
        $data['squareImage'] = $data['squareImage'] ?? null;

        return $data;
    }

    /**
     * Formate les données avant de les sauvegarder.
     */
   /**
 * Formate les données avant de les sauvegarder.
 */
protected function mutateFormDataBeforeSave(array $data): array
{
    if ($this->record) {
        // Récupérer les anciennes images de manière cohérente pour chaque champ
        $existingHeroImages = is_array($this->record->heroImage) ? $this->record->heroImage : [];
        $existingLargeHeroImage = $this->record->largeHeroImage;
        $existingPanoramaImage = $this->record->panoramaImage;
        $existingSquareImage = $this->record->squareImage;

        // Vérifier si de nouvelles images ont été envoyées pour chaque champ
        $newHeroImages = isset($data['heroImage']) ? $data['heroImage'] : [];
        $newLargeHeroImage = $data['largeHeroImage'] ?? $existingLargeHeroImage;
        $newPanoramaImage = $data['panoramaImage'] ?? $existingPanoramaImage;
        $newSquareImage = $data['squareImage'] ?? $existingSquareImage;

        // Si de nouvelles images sont envoyées, combinez-les avec les anciennes pour heroImage
        if (is_array($newHeroImages) && !empty($newHeroImages)) {
            $data['heroImage'] = json_encode(array_merge($existingHeroImages, $newHeroImages));
        } else {
            $data['heroImage'] = json_encode($existingHeroImages); // Conservez les anciennes images si aucune nouvelle n'est envoyée
        }

        // Conservez les anciennes valeurs pour les autres images si aucune nouvelle image n'est envoyée
        $data['largeHeroImage'] = $newLargeHeroImage;
        $data['panoramaImage'] = $newPanoramaImage;
        $data['squareImage'] = $newSquareImage;
    }

    return $data;
}

}

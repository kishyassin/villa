<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillaSousHeroImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path_sous_hero',
    ];

    public function getImagePathSousHeroAttribute($value)
    {
        return $value ? json_decode($value, true) : []; // Retourne un tableau ou un tableau vide si null
    }

    public function setImagePathSousHeroAttribute($value)
    {
        if (is_array($value)) {
            // Si l'image ajoutée est vide, on ne modifie pas la liste
            $currentImages = $this->image_path_sous_hero ?? [];
            $currentImages = array_filter($currentImages); // Supprimer les valeurs vides

            // Ajouter les nouvelles images, tout en évitant les doublons vides
            $newImages = array_merge($currentImages, array_filter($value));

            // Convertir de nouveau en JSON et sauvegarder
            $this->attributes['image_path_sous_hero'] = json_encode($newImages);
        } else {
            $this->attributes['image_path_sous_hero'] = json_encode([]);
        }
    }

}

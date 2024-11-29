<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillaSmallImages extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path_small_image',
    ];

    public function getImagePathPetitImageAttribute($value)
    {
        return $value ? json_decode($value, true) : []; // Retourne un tableau ou un tableau vide si null
    }

    public function setImagePathPetitImageAttribute($value)
    {
        if (is_array($value)) {
            // Si l'image ajoutée est vide, on ne modifie pas la liste
            $currentImages = $this->image_path_petit_image ?? [];
            $currentImages = array_filter($currentImages); // Supprimer les valeurs vides

            // Ajouter les nouvelles images, tout en évitant les doublons vides
            $newImages = array_merge($currentImages, array_filter($value));

            // Convertir de nouveau en JSON et sauvegarder
            $this->attributes['image_path_small_image'] = json_encode($newImages);
        } else {
            $this->attributes['image_path_small_image'] = json_encode([]);
        }
    }

}

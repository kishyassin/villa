<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillaImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path_hero',
        'image_path_sous_hero',
        'image_path_panoramique',
        'image_path_petit_image',
    ];

    // Accessor pour `image_path_sous_hero` (le champ peut être un tableau JSON)
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

    // Accessor pour `image_path_petit_image` (même logique)
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
            $this->attributes['image_path_petit_image'] = json_encode($newImages);
        } else {
            $this->attributes['image_path_petit_image'] = json_encode([]);
        }
    }

    // Accessor pour `image_path_hero` (une seule image)
    public function getImagePathHeroAttribute($value)
    {
        return $value ?? ''; // Retourne une chaîne vide si aucune image
    }

    public function setImagePathHeroAttribute($value)
    {
        $this->attributes['image_path_hero'] = $value ?? ''; // Assurez-vous que l'image Hero peut être vide
    }

    // Accessor pour `image_path_panoramique` (une seule image)
    public function getImagePathPanoramiqueAttribute($value)
    {
        return $value ?? ''; // Retourne une chaîne vide si aucune image
    }

    public function setImagePathPanoramiqueAttribute($value)
    {
        $this->attributes['image_path_panoramique'] = $value ?? ''; // Assurez-vous que l'image panoramique peut être vide
    }
}

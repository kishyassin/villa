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
        return $value ?? ''; // Retourne une chaîne vide si aucune image
    }

    public function setImagePathSousHeroAttribute($value)
    {
        $this->attributes['image_path_sous_hero'] = $value ?? ''; // Assurez-vous que l'image panoramique peut être vide
    }


}

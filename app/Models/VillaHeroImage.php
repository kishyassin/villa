<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillaHeroImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path_hero',
    ];

    public function getImagePathHeroAttribute($value)
    {
        return $value ?? ''; // Retourne une chaîne vide si aucune image
    }

    public function setImagePathHeroAttribute($value)
    {
        $this->attributes['image_path_hero'] = $value ?? ''; // Assurez-vous que l'image Hero peut être vide
    }

}

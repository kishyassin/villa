<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillaPanaromiqueImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path_panoramique',
    ];

    public function getImagePathPanoramiqueAttribute($value)
    {
        return $value ?? ''; // Retourne une chaîne vide si aucune image
    }

    public function setImagePathPanoramiqueAttribute($value)
    {
        $this->attributes['image_path_panoramique'] = $value ?? ''; // Assurez-vous que l'image panoramique peut être vide
    }

}

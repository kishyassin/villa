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
        return $value ?? ''; // Retourne une chaîne vide si aucune image
    }

    public function setImagePathPetitImageAttribute($value)
    {
        $this->attributes['image_path_small_image'] = $value ?? ''; // Assurez-vous que l'image panoramique peut être vide
    }



}

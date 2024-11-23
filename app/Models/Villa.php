<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Villa extends Model
{
    use HasFactory;

    // Définir les champs pouvant être assignés en masse
    protected $fillable = [
        'name',
        'description',
        'location',
        'price',
        'rooms',
        'bathrooms',
        'area',
        'ville',
        'is_available',
    ];

    // Relation avec les images
    public function images()
    {
        return $this->hasMany(VillaImage::class);
    }
}

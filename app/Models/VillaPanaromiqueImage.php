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

    // Accessor pour obtenir l'URL publique de l'image
    public function getImagePathPanoramiqueUrlAttribute()
    {
        return $this->image_path_panoramique
            ? asset('storage/' . $this->image_path_panoramique)
            : null;
    }

    // Supprime le fichier lorsque l'enregistrement est supprimé
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            if ($model->image_path_panoramique) {
                \Storage::disk('public')->delete($model->image_path_panoramique);
            }
        });
    }
}

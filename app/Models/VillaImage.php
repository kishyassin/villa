<?php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillaImage extends Model
{
    use HasFactory;

    // Définir les champs pouvant être assignés en masse
    protected $fillable = [
        'villa_id',
        'image_path',
    ];

    // Relation avec la villa
    public function villa()
    {
        return $this->belongsTo(Villa::class);
    }
}

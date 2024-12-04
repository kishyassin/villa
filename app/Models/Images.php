<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;

    protected $fillable = [
        'largeHeroImage',
        'heroImage',
        'panoramaImage',
        'squareImage',
    ];

    // Accessor pour largeHeroImage
    public function getLargeHeroImageAttribute($value)
    {
        return $value ? json_decode($value) : []; // Retourne un tableau ou un tableau vide
    }

    // Mutator pour largeHeroImage
    public function setLargeHeroImageAttribute($value)
    {
        $this->attributes['largeHeroImage'] = json_encode($value); // Enregistre un tableau en JSON
    }

    // Accessor pour heroImage
    public function getHeroImageAttribute($value)
    {
        return $value ? json_decode($value) : [];
    }

    // Mutator pour heroImage
    public function setHeroImageAttribute($value)
    {
        $this->attributes['heroImage'] = json_encode($value);
    }

    // Accessor pour panoramaImage
    public function getPanoramaImageAttribute($value)
    {
        return $value ? json_decode($value) : [];
    }

    // Mutator pour panoramaImage
    public function setPanoramaImageAttribute($value)
    {
        $this->attributes['panoramaImage'] = json_encode($value);
    }

    // Accessor pour squareImage
    public function getSquareImageAttribute($value)
    {
        return $value ? json_decode($value) : [];
    }

    // Mutator pour squareImage
    public function setSquareImageAttribute($value)
    {
        $this->attributes['squareImage'] = json_encode($value);
    }
}

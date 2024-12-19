<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LargeImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'largeimagepath',
    ];

    public function getlargeimagepathAttribute($value)
    {
        return asset('storage/' . $value);
    }

    // Mutator: Modify the file path when setting
    public function setlargeimagepathAttribute($value)
    {
        $this->attributes['largeimagepath'] = strtolower($value);
    }
}

    // Mutator pour largeHeroImage


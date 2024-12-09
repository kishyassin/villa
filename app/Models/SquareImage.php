<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class squareImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'squareimagespath',
    ];

    public function getsquareimagepathAttribute($value)
    {
        return asset('storage/' . $value);
    }

    // Mutator: Modify the file path when setting
    public function setsquareimagepathAttribute($value)
    {
        $this->attributes['squareimagespath'] = strtolower($value);
    }

    // Mutator pour largeHeroImage
}

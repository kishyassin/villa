<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanaromaImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'panaromaimagepath',
    ];

    // Mutator pour largeHeroImage
    public function getpanaromaimagepathAttribute($value)
    {
        return asset('storage/' . $value);
    }

    // Mutator: Modify the file path when setting
    public function setpanaromaimagepathAttribute($value)
    {
        $this->attributes['panaromaimagepath'] = strtolower($value);
    }
}

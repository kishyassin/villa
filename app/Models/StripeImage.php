<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stripeImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'stripeimagepath',
    ];

    public function getstripeimagepathAttribute($value)
    {
        return asset('storage/' . $value);
    }

    // Mutator: Modify the file path when setting
    public function setstripeimagepathAttribute($value)
    {
        $this->attributes['stripeimagepath'] = strtolower($value);
    }

    // Mutator pour largeHeroImage
}

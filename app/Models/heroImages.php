<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroImages extends Model
{
    use HasFactory;

    protected $table = 'hero_images'; // Optional if your table name matches the convention

    protected $fillable = [
        'heroimagepath',
    ];

    // Accessor: Modify the file path when accessing
    public function getHeroimagepathAttribute($value)
    {
        return asset('storage/' . $value);
    }

    // Mutator: Modify the file path when setting
    public function setHeroimagepathAttribute($value)
    {
        $this->attributes['heroimagepath'] = strtolower($value);
    }
}

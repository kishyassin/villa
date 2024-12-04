<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'heroImage',
        'squareImage',
        'panoramaImage',
        'largeHeroImage',
    ];

}

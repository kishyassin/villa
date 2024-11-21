<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{

        protected $fillable = [
            'title',
            'addresse',
            'mail',
            'phone'
    ];

    public $timestamps = false;
}

<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Relation avec le modèle User
    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }
}

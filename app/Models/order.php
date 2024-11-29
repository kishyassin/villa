<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Relation avec le modèle User
    protected $fillable = [
        'id',
        'date_debut',
        'date_fin',
        'price_order',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }
}

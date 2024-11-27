<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_text',
        'is_accept_show',
        'idUser',  // Identifiant de l'utilisateur qui a posté le commentaire
    ];

    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }
}

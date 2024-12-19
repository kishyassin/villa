<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Define the table name (if it's different from the default, which would be "orders")
    protected $table = 'orders';

    // Define the fillable fields to allow mass assignment
    protected $fillable = [
        'idUser',      // The foreign key for the User
        'date_debut',  // Start date of the rental
        'date_fin',    // End date of the rental
        'price_order',
        'is_accept',   // Whether the order is accepted
    ];

    // If your timestamps are not named `created_at` and `updated_at`, you can define them here
    public $timestamps = true;

    // Relation with the User model (assuming 'idUser' is the foreign key)
    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }
}
    
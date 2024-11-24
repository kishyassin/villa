<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // Create the `orders` table
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUser');
            $table->date('date_debut'); // No default set here
            $table->date('date_fin')->nullable(); // Nullable for optional end date
            $table->boolean('is_accept')->default(false); // Default to false
            $table->timestamps(); // Adds `created_at` and `updated_at`

            // Foreign key constraint
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        // Drop the `orders` table
        Schema::dropIfExists('orders');
    }
};

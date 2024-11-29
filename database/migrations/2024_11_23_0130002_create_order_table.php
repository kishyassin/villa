<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Ensure DB facade is imported for DB::raw()

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUser');
            $table->dateTime('date_debut')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->date('date_fin')->nullable(); // Nullable date
            $table->decimal('price_order', 8, 2); // Decimal with precision
            $table->timestamps(); // Add created_at and updated_at
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade'); // Foreign key
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders'); // Drop the table on rollback
    }
};

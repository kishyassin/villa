<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUser');
            $table->date('date_debut')->default(DB::raw('CURRENT_DATE')); // Par défaut : la date actuelle
            $table->date('date_fin')->nullable();
            $table->decimal('price_order', 8, 2);// Peut être nul si aucune date de fin n'est définie
            $table->timestamps(); // Ajoute created_at et updated_at
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

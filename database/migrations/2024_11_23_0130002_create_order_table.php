<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // Création de la table
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUser');
            $table->date('date_debut')->default(DB::raw('CURRENT_DATE')); // Par défaut : la date actuelle
            $table->date('date_fin')->nullable(); // Peut être nul si aucune date de fin n'est définie
            $table->boolean('is_accept')->default(false); // Par défaut : non accepté
            $table->timestamps(); // Ajoute created_at et updated_at
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
        });

        // Insérer une ligne par défaut après la création de la table (optionnel)
    }

    public function down()
    {
        // Suppression de la table
        Schema::dropIfExists('orders');
    }
};

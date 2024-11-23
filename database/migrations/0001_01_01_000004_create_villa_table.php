<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // Création de la table villas
        Schema::create('villas', function (Blueprint $table) {
            $table->id(); // ID de la villa
            $table->string('name'); // Nom de la villa
            $table->text('description'); // Description détaillée de la villa
            $table->string('location');
            $table->string('ville'); // Localisation de la villa (ville, quartier, etc.)
            $table->decimal('price', 8, 2); // Prix de la villa
            $table->integer('rooms')->default(1); // Nombre de chambres
            $table->integer('bathrooms')->default(1); // Nombre de salles de bains
            $table->decimal('area', 8, 2); // Surface de la villa en m²
            $table->boolean('is_available')->default(true); // Statut de disponibilité (par défaut la villa est disponible)
            $table->timestamps(); // created_at et updated_at
        });

        // Création de la table images
        Schema::create('villa_images', function (Blueprint $table) {
            $table->id(); // ID de l'image
            $table->foreignId('villa_id')->constrained('villas')->onDelete('cascade'); // Clé étrangère vers villas
            $table->string('image_path'); // Chemin de l'image
            $table->timestamps(); // created_at et updated_at
        });
    }

    public function down()
    {
        // Suppression des tables
        Schema::dropIfExists('villa_images');
        Schema::dropIfExists('villas');
    }
};

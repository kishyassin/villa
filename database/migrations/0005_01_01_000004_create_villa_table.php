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

        DB::table('villas')->insert([
            'name' => 'Villa Sunset Paradise',
            'description' => 'Une villa luxueuse avec vue sur la mer, parfaite pour des vacances inoubliables.',
            'location' => 'Rue des Palmiers, Quartier Riviera',
            'ville' => 'Marrakech',
            'price' => 2500.00,
            'rooms' => 3,
            'bathrooms' => 2,
            'area' => 150.50,
            'is_available' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down()
    {
        // Suppression des tables
        Schema::dropIfExists('villas');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Création de la table 'images'
        Schema::create('hero_images', function (Blueprint $table) {
            $table->id();
            $table->string('heroimagepath');
            $table->timestamps();
        });

        DB::table('hero_images')->insert([
            'heroimagepath' => 'images/heroes/banner-01.jpg', // Remplacez par le chemin par défaut souhaité
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insertion de données par défaut dans la table 'images
    }

    public function down(): void
    {
        // Suppression de la table 'images' si elle existe
        Schema::dropIfExists('hero_images');
    }
};

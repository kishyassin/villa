<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Création de la table 'images'
        Schema::create('large_Images', function (Blueprint $table) {
            $table->id();
            $table->string('largeimagepath');
            $table->timestamps();
        });

        DB::table('large_Images')->insert([
            'largeimagepath' => 'images/heroes/video-bg.jpg', // Remplacez par le chemin par défaut souhaité
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        // Insertion de données par défaut dans la table 'images
    }

    public function down(): void
    {
        // Suppression de la table 'images' si elle existe
        Schema::dropIfExists('large_Images');
    }
};

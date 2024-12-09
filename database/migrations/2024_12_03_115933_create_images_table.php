<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Création de la table 'images'
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->json('heroImage');
            $table->string('squareImage');
            $table->string('panoramaImage');
            $table->string('largeHeroImage');
            $table->timestamps();
        });

        // Insertion de données par défaut dans la table 'images'
        DB::table('images')->insert([
            'heroImage' => json_encode(['images/heroes/01JE93B86BRG5E14XEM3JB46CP.jpg']),
            'squareImage' => '"images/squares/01JE98YTERB5ZTWDD7TNAV62F8.jpg"',
            'panoramaImage' => '"images/panoramas/01JEDXXEHSJ4QTY74PZWEHPFN0.jpg"',
            'largeHeroImage' => '"images/heroes/01JEE57H32TY7994FC14N37KZM.jpg"',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        // Suppression de la table 'images' si elle existe
        Schema::dropIfExists('images');
    }
};

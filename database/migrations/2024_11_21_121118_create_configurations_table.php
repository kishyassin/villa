<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Assurez-vous d'importer DB

return new class extends Migration {
    public function up()
    {
        // Création de la table
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Villa');
            $table->string('mail')->default('example.mail');
            $table->string('addresse')->default('marrakech');
            $table->string('phone')->default('000-0999-0000');
        });

        // Insérer une ligne par défaut après la création de la table
        DB::table('configurations')->insert([
            'title' => 'Villa',
            'mail' => 'example.mail',
            'addresse' => 'marrakech',
            'phone' => '000-0999-0000',
        ]);
    }

    public function down()
    {
        // Suppression de la table
        Schema::dropIfExists('configurations');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillaImagesTable extends Migration
{
    public function up()
    {
        Schema::create('villa_images', function (Blueprint $table) {
            $table->id(); // Ajout de la clé primaire
            $table->unsignedBigInteger('villa_id');
            $table->foreign('villa_id')->references('id')->on('villas')->onDelete('cascade');
            $table->string('image_path'); // Colonne pour le chemin de l'image
            $table->timestamps(); // Pour la gestion des dates de création et de mise à jour
        });
        DB::table('villa_images')->insert([
            ['villa_id' => 1, 'image_path' => 'images/property-06.jpg', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }


    public function down()
    {
        Schema::dropIfExists('villa_images');
    }
}

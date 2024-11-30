<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('villa_sous_Hero_images', function (Blueprint $table) {
            $table->id(); // Plusieurs petites images en format JSON
            $table->string('image_path_sous_hero'); // Plusieurs images sous-hero en format JSON
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('villa_sous_Hero_images');
    }
};


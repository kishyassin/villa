<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('villa_hero_images', function (Blueprint $table) {
            $table->id();
            $table->string('image_path_hero');  // Plusieurs petites images en format JSON
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('villa_hero_images');
    }
};


<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('villa_small_images', function (Blueprint $table) {
            $table->id();
            $table->json('image_path_small_image');  // Plusieurs petites images en format JSON
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('villa_small_images');
    }
};


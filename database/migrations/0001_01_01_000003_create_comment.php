<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // Création de la table
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUser'); // Par défaut : la date actuelle
            $table->text('comment_text')->default(""); // Par défaut : non accepté
            $table->boolean("is_accept_show")->default(false);
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });


    }

    public function down()
    {
        // Suppression de la table
        Schema::dropIfExists('comment');
    }
};

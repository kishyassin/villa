<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Default Title');
            $table->string('mail')->default('default@mail.com');
            $table->string('addresse')->default('Default Address');
            $table->string('phone')->default('000-000-0000');
        });
    }

    public function down()
    {
        Schema::dropIfExists('configurations');
    }
};

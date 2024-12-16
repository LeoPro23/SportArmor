<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('valoraciones', function (Blueprint $table) {
            $table->id();
            $table->integer('valor')->comment('Valoración del 1 al 5');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('valoraciones');
    }
};

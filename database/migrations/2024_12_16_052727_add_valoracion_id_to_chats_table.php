<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('chats', function (Blueprint $table) {
            $table->unsignedBigInteger('valoracion_id')->nullable()->after('updated_at');
            $table->foreign('valoracion_id')->references('id')->on('valoraciones')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('chats', function (Blueprint $table) {
            $table->dropForeign(['valoracion_id']);
            $table->dropColumn('valoracion_id');
        });
    }
};

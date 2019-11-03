<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDireccionIdToRegistros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registros', function (Blueprint $table) {
            $table->bigInteger('direccion_id')->unsigned()->nullable();
            $table->foreign('direccion_id')->references('id')->on('direcciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registros', function (Blueprint $table) {
            $table->dropForeign(['direccion_id']);
            $table->dropColumn('direccion_id');
        });
    }
}

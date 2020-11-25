<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGradosIdToParticipantes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('participantes', function (Blueprint $table) {
            $table->bigInteger('grado_id')->unsigned()->nullable();
            $table->foreign('grado_id')->references('id')->on('grados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('participantes', function (Blueprint $table) {
            $table->dropForeign(['grado_id']);
            $table->dropColumn('grado_id');
        });
    }
}

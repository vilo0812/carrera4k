<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPlantelIdToRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registros', function (Blueprint $table) {
            $table->bigInteger('plantel_id')->unsigned()->nullable()->after('n_competidor');
            $table->foreign('plantel_id')->references('id')->on('planteles')->onDelete('cascade');
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
            $table->dropForeign(['plantel_id']);
            $table->dropColumn('plantel_id');
        });
    }
}

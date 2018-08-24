<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableEvolucionHC extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('historiaEvolucion', function (Blueprint $table) {
            $table->integer('idHistoriaClinica')->unsigned()->after("idUsuario");
            $table->foreign('idHistoriaClinica')->references('id')->on('historiaclinica')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

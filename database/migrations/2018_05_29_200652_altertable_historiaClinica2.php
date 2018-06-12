<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AltertableHistoriaClinica2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('historiaClinica', function ($table) {
            
            //$table->integer('idOdontogramaInicial')->unsigned();
            //$table->foreign('idOdontogramaInicial')->references('id')->on('odontograma')->onDelete('cascade');
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

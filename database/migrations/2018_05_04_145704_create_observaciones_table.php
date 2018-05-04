<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObservacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observaciones', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('descripcion');
            $table->string('codigoCUPS');
            $table->string('valorCopago');
            $table->date('fecha');
            $table->string('diente' , 10);
            $table->string('actividad');

            $table->integer('idHistoriaClinica')->unsigned();
            $table->foreign('idHistoriaClinica')->references('id')->on('historiaClinica')->onDelete('cascade');
            
            $table->timestamps();
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

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicio', function (Blueprint $table) {

            $table->increments('id');
            
            $table->integer('idEmpresa')->unsigned();
            $table->foreign('idEmpresa')->references('id')->on('empresa')->onDelete('cascade');

            $table->integer('idHistoriaClinica')->unsigned();
            $table->foreign('idHistoriaClinica')->references('id')->on('historiaClinica')->onDelete('cascade');

            $table->integer('idProcedimiento')->unsigned();
            $table->foreign('idProcedimiento')->references('id')->on('procedimiento')->onDelete('cascade');
            
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

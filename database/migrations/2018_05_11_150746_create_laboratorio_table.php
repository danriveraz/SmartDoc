<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaboratorioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laboratorio', function (Blueprint $table) {

            $table->increments('id');

            $table->string('nombreLaboratorio' , 40);
            $table->string('nombrePaciente' , 40);
            $table->integer('valor');
            $table->date('fechaEnvio');
            $table->date('fechaEntrega');
            $table->string('referencia');
            
            $table->integer('idEmpresa')->unsigned();
            $table->foreign('idEmpresa')->references('id')->on('empresa')->onDelete('cascade');

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

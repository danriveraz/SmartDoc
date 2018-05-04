<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idUsuario')->unsigned();
            $table->foreign('idUsuario')->references('id')->on('users')->onDelete('cascade');

            $table->integer('idEmpresa')->unsigned();
            $table->foreign('idEmpresa')->references('id')->on('empresa')->onDelete('cascade');

            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->string('hora');
            $table->string('color');
            $table->mediumText('titulo');
            
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

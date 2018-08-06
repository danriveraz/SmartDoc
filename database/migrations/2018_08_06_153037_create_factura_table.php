<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idInterno');
            $table->date('fecha');
            $table->string('estado' , 20);

            $table->integer('idEmpresa')->unsigned();
            $table->foreign('idEmpresa')->references('id')->on('empresa')->onDelete('cascade');

            $table->integer('idHistoriaClinica')->unsigned();
            $table->foreign('idHistoriaClinica')->references('id')->on('historiaclinica')->onDelete('cascade');

            $table->integer('idServicio')->unsigned();
            $table->foreign('idServicio')->references('id')->on('servicio')->onDelete('cascade');

            $table->rememberToken();
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

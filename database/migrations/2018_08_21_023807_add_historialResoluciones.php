<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHistorialResoluciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historialResoluciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idEmpresa')->unsigned();
            $table->foreign('idEmpresa')->references('id')->on('empresa')->onDelete('cascade');
            $table->integer('nResolucionFacturacion');
            $table->string('prefijo');
            $table->date('fechaResolucion');
            $table->integer('nInicioFactura');
            $table->integer('nFinFactura');
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

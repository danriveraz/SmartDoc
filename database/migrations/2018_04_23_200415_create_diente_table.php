<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diente', function (Blueprint $table) {
            $table->increments('id');

            $table->string('numero');

            $table->integer('idParteCentro')->unsigned();
            $table->foreign('idParteCentro')->references('id')->on('pDiente')->onDelete('cascade');

            $table->integer('idParteSuperior')->unsigned();
            $table->foreign('idParteSuperior')->references('id')->on('pDiente')->onDelete('cascade');

            $table->integer('idParteInferior')->unsigned();
            $table->foreign('idParteInferior')->references('id')->on('pDiente')->onDelete('cascade');

            $table->integer('idParteDerecha')->unsigned();
            $table->foreign('idParteDerecha')->references('id')->on('pDiente')->onDelete('cascade');

            $table->integer('idParteIzquierda')->unsigned();
            $table->foreign('idParteIzquierda')->references('id')->on('pDiente')->onDelete('cascade');
            
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

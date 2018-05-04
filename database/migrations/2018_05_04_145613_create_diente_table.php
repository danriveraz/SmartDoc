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
            $table->string('parteCentro');
            $table->string('parteSuperior');
            $table->string('parteInferior');
            $table->string('parteDerecha');
            $table->string('parteIzquierda');
            
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

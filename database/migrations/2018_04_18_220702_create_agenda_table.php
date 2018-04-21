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

            $table->integer('idAdmin')->unsigned();
            $table->foreign('idAdmin')->references('id')->on('users')->onDelete('cascade');

            $table->date('fechaIni');
            $table->date('fechaFin');
            $table->boolean('todoeldia');
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

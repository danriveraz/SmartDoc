<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMiPersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('cedula' , 15)->unique();
            $table->string('nombreCompleto' , 40);
            $table->string('telefono' , 20);
            $table->string('direccion' , 40);
            $table->date('fechaNacimiento');
            $table->string('ciudad');
            $table->string('departamento');
            $table->string('descripcionGeneral');
            $table->integer('salario');
            $table->string('sexo' , 10);

            $table->boolean('esPropietario');
            $table->boolean('esAdmin');
            $table->boolean('esEmpleado');

            $table->integer('idAdmin')->unsigned();
            $table->foreign('idAdmin')->references('id')->on('users');

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

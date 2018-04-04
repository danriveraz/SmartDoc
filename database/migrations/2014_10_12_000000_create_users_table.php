<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('esPropietario');
            $table->boolean('esAdmin');
            $table->boolean('esEmpleado');
            $table->string('cedula' , 15)->unique();
            $table->string('nombreCompleto' , 40);
            $table->string('telefono' , 20);
            $table->string('direccion' , 40);
            $table->date('fechaNacimiento');
            $table->string('ciudad');
            $table->string('departamento');
            $table->string('descripcionGeneral');
            $table->integer('salario');
            $table->string('imagen');
            $table->string('sexo' , 10);

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
        Schema::drop('users');
    }
}

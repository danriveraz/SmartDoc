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

            $table->string('nit' , 15)->unique();
            $table->string('nombreEstablecimiento' , 40);
            $table->string('eslogan' , 90);
            $table->string('telefono' , 20);
            $table->string('celular', 20);
            $table->string('direccion' , 40);
            $table->string('ciudad');
            $table->string('departamento');
            $table->string('imagen');

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

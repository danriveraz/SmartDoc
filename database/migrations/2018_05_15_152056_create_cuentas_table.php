<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas', function (Blueprint $table) {

            $table->increments('id');
            
            $table->integer('enero');
            $table->integer('febrero');
            $table->integer('marzo');
            $table->integer('abril');
            $table->integer('mayo');
            $table->integer('junio');
            $table->integer('julio');
            $table->integer('agosto');
            $table->integer('septiembre');
            $table->integer('octubre');
            $table->integer('noviembre');
            $table->integer('diciembre');

            $table->integer('idEmpresa')->unsigned();
            $table->foreign('idEmpresa')->references('id')->on('empresa')->onDelete('cascade');
            
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

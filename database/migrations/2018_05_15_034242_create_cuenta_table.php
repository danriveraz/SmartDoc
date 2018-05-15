<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentaTable extends Migration
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
            
            $table->integer('en');
            $table->integer('feb');
            $table->integer('mrz');
            $table->integer('abr');
            $table->integer('my');
            $table->integer('jun');
            $table->integer('jul');
            $table->integer('ag');
            $table->integer('sept');
            $table->integer('oct');
            $table->integer('nov');
            $table->integer('dic');

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

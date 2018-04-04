<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcedimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedimiento', function (Blueprint $table) {

            $table->increments('id');
            $table->string('nombre' , 40);
            $table->integer('costo');
            $table->string('descripcion');
            $table->string('duracion' , 20);
 
            $table->integer('idAdmin')->unsigned();
            $table->foreign('idAdmin')->references('id')->on('users');
            
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

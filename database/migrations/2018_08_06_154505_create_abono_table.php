<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbonoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abono', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('idFactura')->unsigned();
            $table->foreign('idFactura')->references('id')->on('factura')->onDelete('cascade');

            $table->integer('abono');
            $table->date('fecha');

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

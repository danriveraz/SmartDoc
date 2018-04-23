<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOdontogramaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odontograma', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('idDiente1')->unsigned();
            $table->foreign('idDiente1')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente2')->unsigned();
            $table->foreign('idDiente2')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente3')->unsigned();
            $table->foreign('idDiente3')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente4')->unsigned();
            $table->foreign('idDiente4')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente5')->unsigned();
            $table->foreign('idDiente5')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente6')->unsigned();
            $table->foreign('idDiente6')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente7')->unsigned();
            $table->foreign('idDiente7')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente8')->unsigned();
            $table->foreign('idDiente8')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente9')->unsigned();
            $table->foreign('idDiente9')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente10')->unsigned();
            $table->foreign('idDiente10')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente11')->unsigned();
            $table->foreign('idDiente11')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente12')->unsigned();
            $table->foreign('idDiente12')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente13')->unsigned();
            $table->foreign('idDiente13')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente14')->unsigned();
            $table->foreign('idDiente14')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente15')->unsigned();
            $table->foreign('idDiente15')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente16')->unsigned();
            $table->foreign('idDiente16')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente17')->unsigned();
            $table->foreign('idDiente17')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente18')->unsigned();
            $table->foreign('idDiente18')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente19')->unsigned();
            $table->foreign('idDiente19')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente20')->unsigned();
            $table->foreign('idDiente20')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente21')->unsigned();
            $table->foreign('idDiente21')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente22')->unsigned();
            $table->foreign('idDiente22')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente23')->unsigned();
            $table->foreign('idDiente23')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente24')->unsigned();
            $table->foreign('idDiente24')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente25')->unsigned();
            $table->foreign('idDiente25')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente26')->unsigned();
            $table->foreign('idDiente26')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente27')->unsigned();
            $table->foreign('idDiente27')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente28')->unsigned();
            $table->foreign('idDiente28')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente29')->unsigned();
            $table->foreign('idDiente29')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente30')->unsigned();
            $table->foreign('idDiente30')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente31')->unsigned();
            $table->foreign('idDiente31')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente32')->unsigned();
            $table->foreign('idDiente32')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente33')->unsigned();
            $table->foreign('idDiente33')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente34')->unsigned();
            $table->foreign('idDiente34')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente35')->unsigned();
            $table->foreign('idDiente35')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente36')->unsigned();
            $table->foreign('idDiente36')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente37')->unsigned();
            $table->foreign('idDiente37')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente38')->unsigned();
            $table->foreign('idDiente38')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente39')->unsigned();
            $table->foreign('idDiente39')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente40')->unsigned();
            $table->foreign('idDiente40')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente41')->unsigned();
            $table->foreign('idDiente41')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente42')->unsigned();
            $table->foreign('idDiente42')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente43')->unsigned();
            $table->foreign('idDiente43')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente44')->unsigned();
            $table->foreign('idDiente44')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente45')->unsigned();
            $table->foreign('idDiente45')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente46')->unsigned();
            $table->foreign('idDiente46')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente47')->unsigned();
            $table->foreign('idDiente47')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente48')->unsigned();
            $table->foreign('idDiente48')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente49')->unsigned();
            $table->foreign('idDiente49')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente50')->unsigned();
            $table->foreign('idDiente50')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente51')->unsigned();
            $table->foreign('idDiente51')->references('id')->on('diente')->onDelete('cascade');

            $table->integer('idDiente52')->unsigned();
            $table->foreign('idDiente52')->references('id')->on('diente')->onDelete('cascade');

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

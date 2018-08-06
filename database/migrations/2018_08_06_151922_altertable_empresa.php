<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AltertableEmpresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empresa', function ($table) {
            $table->string('tipoRegimen' , 20)->after('imagen');
            $table->integer('nResolucionFacturacion')->after('tipoRegimen');
            $table->integer('iva')->after('nResolucionFacturacion');
            $table->string('impuesto1' , 20)->after('iva');
            $table->integer('valorImpuesto1')->after('impuesto1');
            $table->string('impuesto2' , 20)->after('valorImpuesto1');
            $table->integer('valorImpuesto2')->after('impuesto2');
            $table->date('fechaResolucion')->after('valorImpuesto2');
            $table->integer('nInicioFactura')->after('fechaResolucion');
            $table->integer('nFinFactura')->after('nInicioFactura');
            $table->integer('contadorFacturacion')->after('nFinFactura');
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

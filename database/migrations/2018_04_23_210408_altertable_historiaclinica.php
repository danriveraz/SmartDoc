<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AltertableHistoriaclinica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('historiaClinica', function ($table) {
          $table->string('planTratamientoAprobado')->after('sanos');
          $table->integer('costoTratamiento')->after('planTratamientoAprobado');
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

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableHistoriaClinica6 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('historiaclinica', function (Blueprint $table) {
            $table->string('observacionesPO')->after('observacionesEE');
            $table->string('observacionesO')->after('observacionesPO');
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

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AltertableCuentas2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cuentas', function ($table) {
            $table->integer('eneroPasado')->after('enero');
            $table->integer('febreroPasado')->after('febrero');
            $table->integer('marzoPasado')->after('marzo');
            $table->integer('abrilPasado')->after('abril');
            $table->integer('mayoPasado')->after('mayo');
            $table->integer('junioPasado')->after('junio');
            $table->integer('julioPasado')->after('julio');
            $table->integer('agostoPasado')->after('agosto');
            $table->integer('septiembrePasado')->after('septiembre');
            $table->integer('octubrePasado')->after('octubre');
            $table->integer('noviembrePasado')->after('noviembre');
            $table->integer('diciembrePasado')->after('diciembre');
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

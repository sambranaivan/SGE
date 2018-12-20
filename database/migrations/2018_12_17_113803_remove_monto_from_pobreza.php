<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveMontoFromPobreza extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pobrezas', function (Blueprint $table) {
            //
             ///step 3 fields
            $table->dropColumn('trabajo');//1
            $table->dropColumn('jubilacion');//2
            $table->dropColumn('despido');//3
            $table->dropColumn('desempleo');//4
            $table->dropColumn('subsidio');//5
            $table->dropColumn('alquiler');//6
            $table->dropColumn('negocio');//7
            $table->dropColumn('intereses');//8
            $table->dropColumn('beca');//9
            $table->dropColumn('cuota_alimentos');//10
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pobrezas', function (Blueprint $table) {
            //
        });
    }
}

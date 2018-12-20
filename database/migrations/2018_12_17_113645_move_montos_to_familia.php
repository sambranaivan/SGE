<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MoveMontosToFamilia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pobreza_familias', function (Blueprint $table) {
            //
             ///step 3 fields
            $table->float('trabajo')->nullable();//1
            $table->float('jubilacion')->nullable();//2
            $table->float('despido')->nullable();//3
            $table->float('desempleo')->nullable();//4
            $table->float('subsidio')->nullable();//5
            $table->float('alquiler')->nullable();//6
            $table->float('negocio')->nullable();//7
            $table->float('intereses')->nullable();//8
            $table->float('beca')->nullable();//9
            $table->float('cuota_alimentos')->nullable();//10
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pobreza_familias', function (Blueprint $table) {
            //
        });
    }
}

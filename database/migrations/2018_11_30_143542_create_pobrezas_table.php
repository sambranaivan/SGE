<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePobrezasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pobrezas', function (Blueprint $table) {
            $table->increments('id');

                //step 1 fields
            $table->string('participacion');
            $table->integer('semana');
            $table->integer('trimestre');
            $table->integer('anio');
            $table->integer('area');
            $table->integer('numero_vivienda');
            $table->string('direccion');
            $table->string('telefono');
            $table->integer('miembros');

                //step 2 fields
                    //dinamic table pobreza_familias

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
        Schema::dropIfExists('pobrezas');
    }
}

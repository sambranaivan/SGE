<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePescasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pescas', function (Blueprint $table) {
            $table->increments('id');
            //
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->string('userid')->nullable();
            $table->string('timestamp')->nullable();
            $table->string('localidad')->nullable();
            $table->string('concurso')->nullable();
            $table->string('fecha')->nullable();
            $table->string('procedencia')->nullable();
            $table->string('cuantas_personas')->nullable();
            $table->string('tipo_alojamiento')->nullable();
            $table->string('cuantas_noches')->nullable();
            $table->string('gasto_alojamiento')->nullable();
            $table->string('cuantos_dias')->nullable();
            $table->string('cuantas_participo')->nullable();
            $table->string('informo')->nullable();
            $table->string('gasto_salida')->nullable();
            $table->string('uso_guia')->nullable();
            $table->string('participo_pesca')->nullable();
            $table->string('modalidad_pesca')->nullable();
            $table->string('actividad_cena')->nullable();
            $table->string('actividad_show')->nullable();
            $table->string('actividad_exposicion')->nullable();
            $table->string('actividad_feria')->nullable();
            $table->string('volveria')->nullable();
            $table->string('gastos_alimentos')->nullable();
            $table->string('gastos_artesanias')->nullable();
            $table->string('gastos_transporte')->nullable();
            $table->string('volveria_visitar')->nullable();
            $table->string('volveria_porque')->nullable();
            $table->string('evalua_alojamiento')->nullable();
            $table->string('evalua_gastronomia')->nullable();
            $table->string('evalua_info_turistica')->nullable();
            $table->string('evalua_excursiones')->nullable();
            $table->string('evalua_limpieza')->nullable();
            $table->string('evalua_seguridad')->nullable();
            $table->string('evalua_naturaleza')->nullable();
            $table->string('evalua_accesso')->nullable();
            $table->string('timestamp')->nullable();
            $table->string('hash')->nullable();
            //
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
        Schema::dropIfExists('pescas');
    }
}

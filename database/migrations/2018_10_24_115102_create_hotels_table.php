<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('zona')->nullable();
            $table->unsignedInteger('municipio_id');
            $table->foreign('municipio_id')->references('id')->on('municipios');
            $table->string('categoria')->nullable();
            $table->string('denominacion')->nullable();
            $table->string('habitacion')->nullable();
            $table->integer('plazas')->nullable();
            $table->string('titular')->nullable();
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->string('email')->nullable();
            $table->string('web')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('chekin')->nullable();
            $table->string('checkout')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('situacion')->nullable();
            $table->string('estrellas')->nullable();
            $table->string('resolucion')->nullable();
            $table->boolean('muestra')->default(false);
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
        Schema::dropIfExists('hotels');
    }
}

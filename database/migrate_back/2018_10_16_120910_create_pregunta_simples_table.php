<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntaSimplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregunta_simples', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pregunta');

            $table->unsignedInteger('encuesta_id');
            $table->foreign('encuesta_id')->references('id')->on('encuestas');

            $table->integer('order');

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
        Schema::dropIfExists('pregunta_simples');
    }
}

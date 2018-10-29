<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tablas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pregunta');
            $table->unsignedInteger('encuesta_id');
            $table->foreign('encuesta_id')->references('id')->on('encuestas');
            $table->integer('order');
            $table->string('type')->default('text');
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
        Schema::dropIfExists('tablas');
    }
}

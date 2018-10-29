<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionSimplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_simples', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pregunta_simple_id');
            $table->foreign('pregunta_simple_id')->references('id')->on('pregunta_simples');



            $table->string('titulo');
            $table->string('valor');
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
        Schema::dropIfExists('option_simples');
    }
}

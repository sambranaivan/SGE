<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionMultiplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_multiples', function (Blueprint $table) {
            $table->increments('id');
             $table->unsignedInteger('pregunta_multiple_id');
            $table->foreign('pregunta_multiple_id')->references('id')->on('pregunta_multiples');
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
        Schema::dropIfExists('option_multiples');
    }
}

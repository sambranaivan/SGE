<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePobrezaFamiliasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pobreza_familias', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pobreza_id');
            $table->foreign('pobreza_id')->references('id')->on('pobrezas')->onDelete('cascade');
            $table->integer('edad');
            $table->string('sexo');//Hombre Mujer
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
        Schema::dropIfExists('pobreza_familias');
    }
}

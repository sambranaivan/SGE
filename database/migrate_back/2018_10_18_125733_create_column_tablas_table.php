<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnTablasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('column_tablas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tabla_id');
            $table->foreign('tabla_id')->references('id')->on('tablas');
            $table->string('titulo');

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
        Schema::dropIfExists('column_tablas');
    }
}

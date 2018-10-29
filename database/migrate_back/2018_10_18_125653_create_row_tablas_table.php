<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRowTablasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('row_tablas', function (Blueprint $table) {
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
        Schema::dropIfExists('row_tablas');
    }
}

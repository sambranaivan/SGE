<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEohValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eoh_values', function (Blueprint $table) {
            $table->increments('id');
            // valores dinamicos de ocupacion refente a las fechas
            $table->unsignedInteger('eoh_id');
            $table->foreign('eoh_id')->references('id')->on('eohs')->onDelete('cascade');
            $table->date('fecha');
            $table->integer('day');
            $table->integer('ocupadas');
            $table->float('porcentaje',5,2);

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
        Schema::dropIfExists('eoh_values');
    }
}

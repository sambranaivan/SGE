<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValorMultiplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valor_multiples', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('consulta_id');
           $table->foreign('consulta_id')->references('id')->on('consultas');

           $table->unsignedInteger('pregunta_multiple_id');
          $table->foreign('pregunta_multiple_id')->references('id')->on('pregunta_multiples');
            $table->timestamps();


            $table->string('valor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('valor_multiples');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValorSimplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valor_simples', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('consulta_id');
           $table->foreign('consulta_id')->references('id')->on('consultas');

           $table->unsignedInteger('pregunta_simple_id');
          $table->foreign('pregunta_simple_id')->references('id')->on('pregunta_simples');

            $table->string('valor');
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
        Schema::dropIfExists('valor_simples');
    }
}

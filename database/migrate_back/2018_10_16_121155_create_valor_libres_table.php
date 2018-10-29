<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValorLibresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valor_libres', function (Blueprint $table) {
            $table->increments('id');

$table->unsignedInteger('consulta_id');
           $table->foreign('consulta_id')->references('id')->on('consultas');

           $table->unsignedInteger('pregunta_libre_id');
          $table->foreign('pregunta_libre_id')->references('id')->on('pregunta_libres');

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
        Schema::dropIfExists('valor_libres');
    }
}

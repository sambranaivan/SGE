<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValorTablasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valor_tablas', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('consulta_id');
            $table->foreign('consulta_id')->references('id')->on('consultas');

            $table->unsignedInteger('tabla_id');
            $table->foreign('tabla_id')->references('id')->on('tablas');

            $table->unsignedInteger('row_tabla_id');
            $table->foreign('row_tabla_id')->references('id')->on('row_tablas');

            $table->unsignedInteger('column_tabla_id');
            $table->foreign('column_tabla_id')->references('id')->on('column_tablas');

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
        Schema::dropIfExists('valor_tablas');
    }
}

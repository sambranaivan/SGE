<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipios', function (Blueprint $table) {
            $table->unsignedInteger('id')->index();
            // $table->unsignedInteger('municipio_id')->index();
            $table->string('nombre');
            $table->string('url');
            $table->string('logo');
            $table->string('microrregion_id');
            $table->unsignedInteger('indec_id');
            $table->string('indec_nombre')->nullable();
            $table->unsignedInteger('departamento_id')->nullable();
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
        Schema::dropIfExists('municipios');
    }
}

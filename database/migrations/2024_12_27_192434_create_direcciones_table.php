<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->string('calle', 100); // Nombre de la calle
            $table->string('numero', 10); // Número de la dirección
            $table->string('comuna', 50); // Comuna o barrio
            $table->string('ciudad', 50); // Ciudad
            $table->string('region', 50); // Región
            $table->string('pais', 50); // País
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direcciones');
    }
}

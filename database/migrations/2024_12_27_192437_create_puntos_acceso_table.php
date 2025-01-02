<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuntosAccesoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puntos_acceso', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->string('nombre', 50)->unique(); // Nombre único del punto de acceso
            $table->text('descripcion')->nullable(); // Descripción opcional del punto de acceso
            $table->timestamps(); // Campos created_at y updated_at
        });

        // Insertar puntos de acceso iniciales
        DB::table('puntos_acceso')->insert([
            ['nombre' => 'Portón Principal', 'descripcion' => 'Acceso principal al recinto.'],
            ['nombre' => 'Polígono', 'descripcion' => 'Ingreso al polígono de tiro.'],
            ['nombre' => 'Cancha 1', 'descripcion' => 'Acceso a la cancha de práctica 1.'],
            ['nombre' => 'Cancha 2', 'descripcion' => 'Acceso a la cancha de práctica 2.'],
            ['nombre' => 'Cancha 3', 'descripcion' => 'Acceso a la cancha de práctica 3.'],
            ['nombre' => 'Cancha 4', 'descripcion' => 'Acceso a la cancha de práctica 4.'],
            ['nombre' => 'Cancha 5', 'descripcion' => 'Acceso a la cancha de práctica 5.'],
            ['nombre' => 'Cancha 6', 'descripcion' => 'Acceso a la cancha de práctica 6.'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puntos_acceso');
    }
}

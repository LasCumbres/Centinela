<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposMembresiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_membresia', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->string('nombre', 50)->unique(); // Nombre del tipo de membresía
            $table->text('descripcion')->nullable(); // Descripción opcional
            $table->timestamps(); // Campos created_at y updated_at
        });

        // Insertar valores iniciales
        DB::table('tipos_membresia')->insert([
            ['nombre' => 'Estándar', 'descripcion' => 'Membresía inicial estándar.'],
            ['nombre' => 'Bronce', 'descripcion' => 'Membresía nivel bronce.'],
            ['nombre' => 'Plata', 'descripcion' => 'Membresía nivel plata.'],
            ['nombre' => 'Oro', 'descripcion' => 'Membresía nivel oro.'],
            ['nombre' => 'Platino', 'descripcion' => 'Membresía nivel platino.'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipos_membresia');
    }
}

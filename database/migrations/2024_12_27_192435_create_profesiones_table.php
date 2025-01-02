<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesiones', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->string('nombre', 50)->unique(); // Nombre de la profesión
            $table->timestamps(); // Campos created_at y updated_at
        });

        // Insertar valores iniciales
        DB::table('profesiones')->insert([
            ['nombre' => 'Ingeniero'],
            ['nombre' => 'Doctor'],
            ['nombre' => 'Abogado'],
            ['nombre' => 'Arquitecto'],
            ['nombre' => 'Profesor'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profesiones');
    }
}

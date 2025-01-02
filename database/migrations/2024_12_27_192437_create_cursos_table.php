<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->string('nombre', 100); // Nombre del curso
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade'); // Relación con categorías
            $table->text('descripcion')->nullable(); // Descripción opcional
            $table->timestamps(); // Campos created_at y updated_at
        });

        // Insertar valores iniciales
        DB::table('cursos')->insert([
            ['nombre' => 'Manejo de armas cortas', 'categoria_id' => 1, 'descripcion' => 'Curso sobre manejo seguro de armas cortas.'],
            ['nombre' => 'Tiro al blanco avanzado', 'categoria_id' => 2, 'descripcion' => 'Curso avanzado para precisión en el tiro al blanco.'],
            ['nombre' => 'Leyes sobre armas', 'categoria_id' => 3, 'descripcion' => 'Curso sobre legislación y regulación de armas.'],
            ['nombre' => 'Tácticas defensivas', 'categoria_id' => 4, 'descripcion' => 'Curso sobre tácticas y estrategias defensivas.'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}

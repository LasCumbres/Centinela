<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->string('nombre', 50)->unique(); // Nombre de la categoría
            $table->timestamps(); // Campos created_at y updated_at
        });

        // Insertar valores iniciales
        DB::table('categorias')->insert([
            ['nombre' => 'Directorio'],
            ['nombre' => 'Fundador'],
            ['nombre' => 'Nuevo'],
            ['nombre' => 'Vitalicio'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->string('nombre', 100)->unique(); // Nombre de la empresa
            $table->text('descripcion')->nullable(); // Descripción opcional
            $table->timestamps(); // Campos created_at y updated_at
        });

        // Insertar valores iniciales
        DB::table('empresas')->insert([
            ['nombre' => 'Empresa A', 'descripcion' => 'Empresa de ejemplo A.'],
            ['nombre' => 'Empresa B', 'descripcion' => 'Empresa de ejemplo B.'],
            ['nombre' => 'Empresa C', 'descripcion' => 'Empresa de ejemplo C.'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}

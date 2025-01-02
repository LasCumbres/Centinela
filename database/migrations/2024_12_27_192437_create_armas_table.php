<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('armas', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->foreignId('socio_id')->constrained('socios')->onDelete('cascade'); // Relación con socios
            $table->foreignId('marca_id')->constrained('marcas')->onDelete('cascade'); // Relación con marcas
            $table->string('modelo', 50); // Modelo del arma
            $table->string('calibre', 20); // Calibre del arma
            $table->binary('padron')->nullable(); // Padrón (imagen almacenada como binario)
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
        Schema::dropIfExists('armas');
    }
}

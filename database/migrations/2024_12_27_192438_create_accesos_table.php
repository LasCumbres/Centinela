<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accesos', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->foreignId('socio_id')->constrained('socios')->onDelete('cascade'); // Relación con socios
            $table->foreignId('punto_acceso_id')->constrained('puntos_acceso')->onDelete('cascade'); // Relación con puntos de acceso
            $table->timestamp('fecha_hora_ingreso'); // Fecha y hora del ingreso
            $table->timestamp('fecha_hora_salida')->nullable(); // Fecha y hora de la salida (opcional)
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
        Schema::dropIfExists('accesos');
    }
}

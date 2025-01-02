<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificaciones', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->foreignId('socio_id')->constrained('socios')->onDelete('cascade'); // Relación con socios
            $table->foreignId('curso_id')->constrained('cursos')->onDelete('cascade'); // Relación con cursos
            $table->date('fecha_emision'); // Fecha de emisión de la certificación
            $table->date('fecha_vencimiento')->nullable(); // Fecha de vencimiento (opcional)
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
        Schema::dropIfExists('certificaciones');
    }
}

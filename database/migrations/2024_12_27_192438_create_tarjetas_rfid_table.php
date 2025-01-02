<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarjetasRfidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarjetas_rfid', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->foreignId('socio_id')->constrained('socios')->onDelete('cascade'); // Relación con socios
            $table->string('codigo_rfid', 50)->unique(); // Código único RFID de la tarjeta
            $table->boolean('activo')->default(true); // Estado de la tarjeta (activa/inactiva)
            $table->date('fecha_asignacion'); // Fecha de asignación de la tarjeta
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
        Schema::dropIfExists('tarjetas_rfid');
    }
}

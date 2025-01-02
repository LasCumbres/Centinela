<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSociosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socios', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->string('rut', 12)->unique(); // RUT del socio
            $table->string('nombre', 100); // Nombre
            $table->string('apellido_paterno', 100); // Apellido paterno
            $table->string('apellido_materno', 100)->nullable(); // Apellido materno
            $table->date('fecha_nacimiento'); // Fecha de nacimiento
            $table->string('correo', 150)->unique(); // Correo electrónico único
            $table->foreignId('direccion_id')->nullable()->constrained('direcciones')->onDelete('cascade'); // Relación con direcciones
            $table->foreignId('tipo_membresia_id')->constrained('tipos_membresia')->onDelete('cascade'); // Relación con tipos de membresía
            $table->date('fecha_ingreso'); // Fecha de ingreso
            $table->date('fecha_termino')->nullable(); // Fecha de término (opcional)
            $table->boolean('estado_cuenta')->default(true); // Estado de la cuenta
            $table->text('descripcion')->nullable(); // Descripción opcional
            $table->foreignId('profesion_id')->nullable()->constrained('profesiones')->onDelete('cascade'); // Relación con profesiones
            $table->foreignId('empresa_id')->nullable()->constrained('empresas')->onDelete('cascade'); // Relación con empresas
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
        Schema::dropIfExists('socios');
    }
}

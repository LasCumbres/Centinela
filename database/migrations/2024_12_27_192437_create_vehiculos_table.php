<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('marcas_vehiculos', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->string('nombre', 50)->unique(); // Nombre de la marca
            $table->timestamps(); // Campos created_at y updated_at
        });

        Schema::create('modelos_vehiculos', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->foreignId('marca_id')->constrained('marcas_vehiculos')->onDelete('cascade'); // Relación con marcas de vehículos
            $table->string('nombre', 50); // Nombre del modelo
            $table->timestamps(); // Campos created_at y updated_at
        });

        // Insertar marcas de vehículos
        DB::table('marcas_vehiculos')->insert([
            ['nombre' => 'Chevrolet'],
            ['nombre' => 'Suzuki'],
            ['nombre' => 'Toyota'],
            ['nombre' => 'Hyundai'],
            ['nombre' => 'Kia'],
            ['nombre' => 'Nissan'],
            ['nombre' => 'MG (Morris Garages)'],
            ['nombre' => 'Chery'],
            ['nombre' => 'Peugeot'],
            ['nombre' => 'Ford'],
            ['nombre' => 'Volkswagen'],
            ['nombre' => 'Mitsubishi'],
            ['nombre' => 'Renault'],
            ['nombre' => 'Mazda'],
            ['nombre' => 'Subaru'],
            ['nombre' => 'Honda'],
            ['nombre' => 'Fiat'],
            ['nombre' => 'Haval'],
            ['nombre' => 'Great Wall'],
            ['nombre' => 'Jeep'],
        ]);

        // Insertar modelos de vehículos
        DB::table('modelos_vehiculos')->insert([
            ['marca_id' => 1, 'nombre' => 'Spark'],
            ['marca_id' => 1, 'nombre' => 'Sail'],
            ['marca_id' => 2, 'nombre' => 'Swift'],
            ['marca_id' => 2, 'nombre' => 'Baleno'],
            ['marca_id' => 3, 'nombre' => 'Corolla'],
            ['marca_id' => 3, 'nombre' => 'Hilux'],
            ['marca_id' => 4, 'nombre' => 'Tucson'],
            ['marca_id' => 4, 'nombre' => 'Santa Fe'],
            ['marca_id' => 5, 'nombre' => 'Sportage'],
            ['marca_id' => 5, 'nombre' => 'Sorento'],
            ['marca_id' => 6, 'nombre' => 'Versa'],
            ['marca_id' => 6, 'nombre' => 'Kicks'],
            ['marca_id' => 7, 'nombre' => 'ZS'],
            ['marca_id' => 7, 'nombre' => 'HS'],
            ['marca_id' => 8, 'nombre' => 'Tiggo 2'],
            ['marca_id' => 8, 'nombre' => 'Tiggo 4'],
            ['marca_id' => 9, 'nombre' => '208'],
            ['marca_id' => 9, 'nombre' => '2008'],
            ['marca_id' => 10, 'nombre' => 'Ranger'],
            ['marca_id' => 10, 'nombre' => 'Escape'],
        ]);

        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->foreignId('socio_id')->constrained('socios')->onDelete('cascade'); // Relación con socios
            $table->foreignId('modelo_id')->constrained('modelos_vehiculos')->onDelete('cascade'); // Relación con modelos de vehículos
            $table->string('patente', 10)->unique(); // Patente única del vehículo
            $table->string('color', 30); // Color del vehículo
            $table->year('anio'); // Año del vehículo
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
        Schema::dropIfExists('vehiculos');
        Schema::dropIfExists('modelos_vehiculos');
        Schema::dropIfExists('marcas_vehiculos');
    }
}

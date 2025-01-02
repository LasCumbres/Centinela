<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarcasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marcas', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->string('nombre', 100)->unique(); // Nombre de la marca
            $table->text('descripcion')->nullable(); // Descripción opcional
            $table->timestamps(); // Campos created_at y updated_at
        });

        // Insertar valores iniciales
        DB::table('marcas')->insert([
            ['nombre' => 'Glock', 'descripcion' => 'Fabricante austríaco reconocido por sus pistolas semiautomáticas.'],
            ['nombre' => 'Colt', 'descripcion' => 'Fabricante estadounidense conocido por el Colt 1911.'],
            ['nombre' => 'Smith & Wesson', 'descripcion' => 'Especialista en armas deportivas y de seguridad.'],
            ['nombre' => 'Beretta', 'descripcion' => 'Fabricante italiano de armas de fuego.'],
            ['nombre' => 'Remington', 'descripcion' => 'Marca americana de armas de fuego y municiones.'],
            ['nombre' => 'Sig Sauer', 'descripcion' => 'Fabricante suizo-alemán reconocido por armas de precisión.'],
            ['nombre' => 'Heckler & Koch', 'descripcion' => 'Fabricante alemán de armas como el MP5 y G36.'],
            ['nombre' => 'FN Herstal', 'descripcion' => 'Fabricante belga conocido por el FN FAL y P90.'],
            ['nombre' => 'Walther', 'descripcion' => 'Fabricante alemán reconocido por pistolas como la PPK.'],
            ['nombre' => 'CZ (Česká Zbrojovka)', 'descripcion' => 'Fabricante checo famoso por la CZ 75.'],
            ['nombre' => 'Taurus', 'descripcion' => 'Fabricante brasileño de armas de fuego.'],
            ['nombre' => 'Ruger', 'descripcion' => 'Fabricante estadounidense de armas deportivas y de defensa.'],
            ['nombre' => 'Mossberg', 'descripcion' => 'Fabricante estadounidense conocido por escopetas.'],
            ['nombre' => 'Winchester', 'descripcion' => 'Fabricante estadounidense histórico de rifles.'],
            ['nombre' => 'Browning', 'descripcion' => 'Fabricante conocido por armas de caza y deportivas.'],
            ['nombre' => 'Desert Eagle', 'descripcion' => 'Fabricante de pistolas de gran calibre.'],
            ['nombre' => 'Kalashnikov', 'descripcion' => 'Fabricante ruso conocido por el AK-47.'],
            ['nombre' => 'Steyr Arms', 'descripcion' => 'Fabricante austríaco reconocido por rifles de precisión.'],
            ['nombre' => 'IWI (Israel Weapon Industries)', 'descripcion' => 'Fabricante israelí del Tavor y Uzi.'],
            ['nombre' => 'Fabarm', 'descripcion' => 'Fabricante italiano especializado en escopetas.'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marcas');
    }
}

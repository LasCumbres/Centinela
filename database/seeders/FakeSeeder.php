<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FakeSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('es_CL'); // Faker para generar datos en español
        $socios = [];

        // Generar 10 datos falsos
        for ($i = 1; $i <= 10; $i++) {
            $rut = $this->generateValidRut();

            $socios[] = [
                'rut' => $rut,
                'nombre' => $faker->firstName,
                'apellido_paterno' => $faker->lastName,
                'apellido_materno' => $faker->lastName,
                'fecha_nacimiento' => $faker->date('Y-m-d', '2000-01-01'),
                'correo' => $faker->unique()->safeEmail,
                'direccion_id' => null, // Relación pendiente
                'tipo_membresia_id' => rand(1, 5), // ID de tipo de membresía (1-5)
                'fecha_ingreso' => now(),
                'fecha_termino' => now()->addYear(),
                'estado_cuenta' => rand(0, 1), // 1: Activo, 0: Inactivo
                'descripcion' => 'Socio generado automáticamente',
                'profesion_id' => null, // Relación pendiente
                'empresa_id' => null, // Relación pendiente
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insertar los datos en la tabla socios
        DB::table('socios')->insert($socios);
    }

    /**
     * Genera un RUT chileno válido.
     *
     * @return string
     */
    private function generateValidRut()
    {
        $number = rand(1000000, 25000000); // Número base del RUT
        $digit = $this->calculateRutCheckDigit($number);

        return $number . '-' . $digit;
    }

    /**
     * Calcula el dígito verificador de un RUT chileno.
     *
     * @param int $number
     * @return string
     */
    private function calculateRutCheckDigit($number)
    {
        $multiplier = 2;
        $sum = 0;

        while ($number > 0) {
            $sum += ($number % 10) * $multiplier;
            $number = (int)($number / 10);
            $multiplier = $multiplier === 7 ? 2 : $multiplier + 1;
        }

        $remainder = $sum % 11;
        $checkDigit = 11 - $remainder;

        if ($checkDigit === 11) {
            return '0';
        } elseif ($checkDigit === 10) {
            return 'K';
        }

        return (string)$checkDigit;
    }
}

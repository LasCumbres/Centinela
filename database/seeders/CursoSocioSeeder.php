<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursoSocioSeeder extends Seeder
{
    public function run()
    {
        DB::table('curso_socio')->insert([
            [
                'socio_id' => 1,
                'curso_id' => 1,
                'fecha_certificacion' => now()->subYear(),
                'fecha_vencimiento' => now()->addYear(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'socio_id' => 2,
                'curso_id' => 2,
                'fecha_certificacion' => now()->subYear(),
                'fecha_vencimiento' => now()->addYear(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}


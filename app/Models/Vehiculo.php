<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $table = 'vehiculos';

    protected $fillable = [
        'socio_id',
        'patente',
        'marca',
        'modelo',
        'color',
        'anio',
    ];

    // Relación inversa con Socio
    public function socio()
    {
        return $this->belongsTo(Socio::class);
    }
}

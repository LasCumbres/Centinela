<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos';

    protected $fillable = [
        'nombre',
        'categoria',
    ];

    // Relación muchos a muchos con Socios
    public function socios()
    {
        return $this->belongsToMany(Socio::class)->withPivot('fecha_certificacion', 'fecha_vencimiento')->withTimestamps();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Socio extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'socios';

    protected $fillable = [
        'rut',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'correo',
        'fecha_nacimiento',
        'direccion_id',
        'tipo_membresia_id',
        'fecha_ingreso',
        'fecha_termino',
        'estado_cuenta',
        'descripcion',
        'profesion_id',
        'empresa_id',
        'foto_perfil',
    ];
    

    // Relación uno a muchos con Armas
    public function armas()
    {
        return $this->hasMany(Arma::class);
    }

    // Relación uno a muchos con Vehículos
    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class);
    }

    // Relación muchos a muchos con Cursos

    public function cursos()
    {
        return $this->belongsToMany(Curso::class)->withPivot('fecha_certificacion', 'fecha_vencimiento')->withTimestamps();
    }

}

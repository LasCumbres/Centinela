<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arma extends Model
{
    use HasFactory;

    protected $table = 'armas';

    protected $fillable = [
        'socio_id',
        'marca',
        'modelo',
        'calibre',
        'padron',
    ];

    // Relación inversa con Socio
    public function socio()
    {
        return $this->belongsTo(Socio::class);
    }
}

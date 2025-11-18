<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = 'animales';

    protected $fillable = [
        'nombre',
        'precio',
        'stock',
        'fecha_nacimiento',
        'descripcion',
        'especie_id',
        'raza_id',
        'unidad_id',
        'estado_id',
    ];

    public function especie()
    {
        return $this->belongsTo(Especie::class);
    }

    public function raza()
    {
        return $this->belongsTo(Raza::class);
    }

    public function unidad()
    {
        return $this->belongsTo(Unidad::class);
    }

    public function estado()
    {
        return $this->belongsTo(EstadoProducto::class, 'estado_id');
    }
}

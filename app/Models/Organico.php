<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organico extends Model
{
    protected $table = 'organicos';

    protected $fillable = [
        'nombre',
        'precio',
        'stock',
        'fecha_cosecha',
        'descripcion',
        'unidad_id',
        'estado_id',
    ];

    public function unidad()
    {
        return $this->belongsTo(Unidad::class);
    }

    public function estado()
    {
        return $this->belongsTo(EstadoProducto::class, 'estado_id');
    }
}

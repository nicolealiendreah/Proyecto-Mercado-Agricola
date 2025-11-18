<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maquinaria extends Model
{
    protected $fillable = [
        'nombre',
        'marca',
        'modelo',
        'precio_dia',
        'descripcion',
        'tipo_maquinaria_id',
        'estado_id',
    ];

    public function tipoMaquinaria()
    {
        return $this->belongsTo(TipoMaquinaria::class);
    }

    public function estado()
    {
        return $this->belongsTo(EstadoProducto::class, 'estado_id');
    }
}

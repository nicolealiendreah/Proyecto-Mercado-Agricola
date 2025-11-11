<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maquinaria extends Model
{
    protected $fillable = [
        'nombre',
        'tipo', 'marca', 'modelo', 'estado',   
        'tipo_id', 'marca_id', 'modelo_id', 'estado_id', 
        'precio_dia',
        'descripcion',
    ];

    public function tipoParam()
    {
        return $this->belongsTo(\App\Models\Param::class, 'tipo_id');
    }

    public function marcaParam()
    {
        return $this->belongsTo(\App\Models\Param::class, 'marca_id');
    }

    public function modeloParam()
    {
        return $this->belongsTo(\App\Models\Param::class, 'modelo_id');
    }

    public function estadoParam()
    {
        return $this->belongsTo(\App\Models\Param::class, 'estado_id');
    }

    public function getTipoNombreAttribute()
    {
        return $this->tipoParam->nombre ?? $this->tipo;
    }

    public function getMarcaNombreAttribute()
    {
        return $this->marcaParam->nombre ?? $this->marca;
    }

    public function getModeloNombreAttribute()
    {
        return $this->modeloParam->nombre ?? $this->modelo;
    }

    public function getEstadoNombreAttribute()
    {
        return $this->estadoParam->nombre ?? $this->estado;
    }
}

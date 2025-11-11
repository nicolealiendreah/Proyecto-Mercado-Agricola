<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organico extends Model
{
    protected $fillable = [
        'nombre','categoria','precio','stock','fecha_cosecha','descripcion',
        'categoria_id','variedad_id','unidad_id','estado_id',
    ];

    public function categoriaParam(){ return $this->belongsTo(\App\Models\Param::class,'categoria_id'); }
    public function variedadParam(){ return $this->belongsTo(\App\Models\Param::class,'variedad_id'); }
    public function unidadParam()   { return $this->belongsTo(\App\Models\Param::class,'unidad_id'); }
    public function estadoParam()   { return $this->belongsTo(\App\Models\Param::class,'estado_id'); }

    public function getCategoriaNombreAttribute(){ return $this->categoriaParam->nombre ?? $this->categoria; }
    public function getVariedadNombreAttribute(){ return $this->variedadParam->nombre ?? null; }
    public function getUnidadNombreAttribute()   { return $this->unidadParam->nombre ?? null; }
    public function getEstadoNombreAttribute()   { return $this->estadoParam->nombre ?? null; }
}

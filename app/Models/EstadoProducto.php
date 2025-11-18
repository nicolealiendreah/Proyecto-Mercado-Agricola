<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoProducto extends Model
{
    protected $table = 'estado_productos';
    protected $fillable = ['nombre', 'activo'];

    public function animales()
    {
        return $this->hasMany(Animal::class, 'estado_id');
    }

    public function organicos()
    {
        return $this->hasMany(Organico::class, 'estado_id');
    }

    public function maquinarias()
    {
        return $this->hasMany(Maquinaria::class, 'estado_id');
    }
}

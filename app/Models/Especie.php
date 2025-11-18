<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    protected $fillable = ['nombre', 'activo'];

    public function razas()
    {
        return $this->hasMany(Raza::class);
    }

    public function animales()
    {
        return $this->hasMany(Animal::class);
    }
}

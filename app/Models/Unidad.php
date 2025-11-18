<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    protected $table = 'unidades';

    protected $fillable = ['nombre', 'simbolo', 'activo'];
    public function animales()
    {
        return $this->hasMany(Animal::class);
    }

    public function organicos()
    {
        return $this->hasMany(Organico::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organico extends Model
{
    protected $fillable = [
        'nombre','categoria','precio','stock','fecha_cosecha','descripcion'
    ];
}


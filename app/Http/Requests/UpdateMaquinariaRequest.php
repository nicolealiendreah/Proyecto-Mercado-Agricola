<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMaquinariaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre'      => 'required|string|max:120',
            'tipo_id'     => 'required|integer|exists:params,id',
            'marca_id'    => 'required|integer|exists:params,id',
            'modelo_id'   => 'nullable|integer|exists:params,id',
            'estado_id'   => 'required|integer|exists:params,id',
            'tipo'        => 'nullable|string|max:60',
            'marca'       => 'nullable|string|max:60',
            'modelo'      => 'nullable|string|max:60',
            'estado'      => 'nullable|in:disponible,en_mantenimiento,dado_baja',
            'precio_dia'  => 'required|numeric|min:0',
            'descripcion' => 'nullable|string|max:2000',
        ];
    }
}

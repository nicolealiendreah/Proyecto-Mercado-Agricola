<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrganicoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre'        => 'required|string|max:100',

            'categoria_id'  => 'required|integer|exists:params,id',
            'variedad_id'   => 'required|integer|exists:params,id',
            'unidad_id'     => 'required|integer|exists:params,id',
            'estado_id'     => 'required|integer|exists:params,id',

            'categoria'     => 'nullable|string|max:50',
            'estado'        => 'nullable|string|max:50',
            'unidad'        => 'nullable|string|max:50',
            'variedad'      => 'nullable|string|max:50',

            'precio'        => 'required|numeric|min:0',
            'stock'         => 'required|integer|min:0',
            'fecha_cosecha' => 'nullable|date',
            'descripcion'   => 'nullable|string|max:2000',
        ];
    }
}

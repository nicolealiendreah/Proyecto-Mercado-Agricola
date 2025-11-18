<?php

namespace App\Http\Controllers;

use App\Models\Maquinaria;
use App\Models\TipoMaquinaria;
use App\Models\EstadoProducto;
use Illuminate\Http\Request;

class MaquinariaController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');

        $maquinarias = Maquinaria::with(['tipoMaquinaria', 'estado'])
            ->when($q, function ($query, $q) {
                $query->where('nombre', 'ILIKE', "%$q%");
            })
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('maquinarias.index', compact('maquinarias', 'q'));
    }

    public function create()
    {
        $tipos   = TipoMaquinaria::orderBy('nombre')->get();
        $estados = EstadoProducto::orderBy('nombre')->get();

        return view('maquinarias.create', compact('tipos', 'estados'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'             => 'required|string|max:255',
            'marca'              => 'required|string|max:255',
            'modelo'             => 'nullable|string|max:255',
            'precio_dia'         => 'required|numeric|min:0',
            'descripcion'        => 'nullable|string',
            'tipo_maquinaria_id' => 'required|exists:tipo_maquinarias,id',
            'estado_id'          => 'required|exists:estado_productos,id',
        ]);

        Maquinaria::create($data);

        return redirect()->route('maquinarias.index')
            ->with('success', 'Maquinaria creada correctamente');
    }

    public function edit(Maquinaria $maquinaria)
    {
        $tipos   = TipoMaquinaria::orderBy('nombre')->get();
        $estados = EstadoProducto::orderBy('nombre')->get();

        return view('maquinarias.edit', compact('maquinaria', 'tipos', 'estados'));
    }

    public function update(Request $request, Maquinaria $maquinaria)
    {
        $data = $request->validate([
            'nombre'             => 'required|string|max:255',
            'marca'              => 'required|string|max:255',
            'modelo'             => 'nullable|string|max:255',
            'precio_dia'         => 'required|numeric|min:0',
            'descripcion'        => 'nullable|string',
            'tipo_maquinaria_id' => 'required|exists:tipo_maquinarias,id',
            'estado_id'          => 'required|exists:estado_productos,id',
        ]);

        $maquinaria->update($data);

        return redirect()->route('maquinarias.index')
            ->with('success', 'Maquinaria actualizada correctamente');
    }

    public function destroy(Maquinaria $maquinaria)
    {
        $maquinaria->delete();

        return redirect()->route('maquinarias.index')
            ->with('success', 'Maquinaria eliminada');
    }
}

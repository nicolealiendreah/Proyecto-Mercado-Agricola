<?php

namespace App\Http\Controllers;

use App\Models\TipoMaquinaria;
use Illuminate\Http\Request;

class TipoMaquinariaController extends Controller
{
    public function index()
    {
        $tipos = TipoMaquinaria::orderBy('id','desc')->paginate(10);
        return view('tipos_maquinaria.index', compact('tipos'));
    }

    public function create()
    {
        return view('tipos_maquinaria.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        TipoMaquinaria::create($request->only('nombre'));

        return redirect()->route('tipos-maquinaria.index')
            ->with('success', 'Tipo creado correctamente');
    }

    public function edit(TipoMaquinaria $tipos_maquinarium)
    {
        return view('tipos_maquinaria.edit', [
            'tipo' => $tipos_maquinarium
        ]);
    }

    public function update(Request $request, TipoMaquinaria $tipos_maquinarium)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $tipos_maquinarium->update($request->only('nombre'));

        return redirect()->route('tipos-maquinaria.index')
            ->with('success', 'Tipo actualizado correctamente');
    }

    public function destroy(TipoMaquinaria $tipos_maquinarium)
    {
        $tipos_maquinarium->delete();

        return redirect()->route('tipos-maquinaria.index')
            ->with('success', 'Tipo eliminado');
    }
}

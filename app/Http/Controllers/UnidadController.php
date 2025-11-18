<?php

namespace App\Http\Controllers;

use App\Models\Unidad;
use Illuminate\Http\Request;

class UnidadController extends Controller
{
    public function index()
    {
        $unidades = Unidad::orderBy('id','desc')->paginate(10);
        return view('unidades.index', compact('unidades'));
    }

    public function create()
    {
        return view('unidades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'  => 'required|string|max:255',
            'simbolo' => 'nullable|string|max:10',
        ]);

        Unidad::create($request->only('nombre','simbolo'));

        return redirect()->route('unidades.index')
            ->with('success', 'Unidad creada correctamente');
    }

    public function edit(Unidad $unidad)
    {
        return view('unidades.edit', compact('unidad'));
    }

    public function update(Request $request, Unidad $unidad)
    {
        $request->validate([
            'nombre'  => 'required|string|max:255',
            'simbolo' => 'nullable|string|max:10',
        ]);

        $unidad->update($request->only('nombre','simbolo'));

        return redirect()->route('unidades.index')
            ->with('success', 'Unidad actualizada correctamente');
    }

    public function destroy(Unidad $unidad)
    {
        $unidad->delete();

        return redirect()->route('unidades.index')
            ->with('success', 'Unidad eliminada');
    }
}

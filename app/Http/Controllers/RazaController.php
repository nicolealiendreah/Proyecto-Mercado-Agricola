<?php

namespace App\Http\Controllers;

use App\Models\Raza;
use App\Models\Especie;
use Illuminate\Http\Request;

class RazaController extends Controller
{
    public function index()
    {
        $razas = Raza::with('especie')->orderBy('id','desc')->paginate(10);
        return view('razas.index', compact('razas'));
    }

    public function create()
    {
        $especies = Especie::orderBy('nombre')->get();
        return view('razas.create', compact('especies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'     => 'required|string|max:255',
            'especie_id' => 'required|exists:especies,id',
        ]);

        Raza::create($request->only('nombre','especie_id'));

        return redirect()->route('razas.index')
            ->with('success', 'Raza creada correctamente');
    }

    public function edit(Raza $raza)
    {
        $especies = Especie::orderBy('nombre')->get();
        return view('razas.edit', compact('raza','especies'));
    }

    public function update(Request $request, Raza $raza)
    {
        $request->validate([
            'nombre'     => 'required|string|max:255',
            'especie_id' => 'required|exists:especies,id',
        ]);

        $raza->update($request->only('nombre','especie_id'));

        return redirect()->route('razas.index')
            ->with('success', 'Raza actualizada correctamente');
    }

    public function destroy(Raza $raza)
    {
        $raza->delete();

        return redirect()->route('razas.index')
            ->with('success', 'Raza eliminada');
    }
}

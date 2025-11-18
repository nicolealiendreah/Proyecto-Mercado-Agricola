<?php

namespace App\Http\Controllers;

use App\Models\Especie;
use Illuminate\Http\Request;

class EspecieController extends Controller
{
    public function index()
    {
        $especies = Especie::orderBy('id','desc')->paginate(10);
        return view('especies.index', compact('especies'));
    }

    public function create()
    {
        return view('especies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        Especie::create($request->only('nombre'));

        return redirect()->route('especies.index')
            ->with('success', 'Especie creada correctamente');
    }

    public function edit(Especie $especy)
    {
        return view('especies.edit', ['especie' => $especy]);
    }

    public function update(Request $request, Especie $especy)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $especy->update($request->only('nombre'));

        return redirect()->route('especies.index')
            ->with('success', 'Especie actualizada correctamente');
    }

    public function destroy(Especie $especy)
    {
        $especy->delete();

        return redirect()->route('especies.index')
            ->with('success', 'Especie eliminada');
    }
}

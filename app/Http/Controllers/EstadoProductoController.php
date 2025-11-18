<?php

namespace App\Http\Controllers;

use App\Models\EstadoProducto;
use Illuminate\Http\Request;

class EstadoProductoController extends Controller
{
    public function index()
    {
        $estados = EstadoProducto::orderBy('id','desc')->paginate(10);
        return view('estados.index', compact('estados'));
    }

    public function create()
    {
        return view('estados.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        EstadoProducto::create($request->only('nombre'));

        return redirect()->route('estados-producto.index')
            ->with('success', 'Estado creado correctamente');
    }

    public function show(EstadoProducto $estado)
    {
        return view('estados.show', compact('estado'));
    }

    public function edit(EstadoProducto $estado)
    {
        return view('estados.edit', compact('estado'));
    }

    public function update(Request $request, EstadoProducto $estado)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $estado->update($request->only('nombre'));

        return redirect()->route('estados-producto.index')
            ->with('success', 'Estado actualizado correctamente');
    }

    public function destroy(EstadoProducto $estado)
    {
        $estado->delete();

        return redirect()->route('estados-producto.index')
            ->with('success', 'Estado eliminado');
    }
}

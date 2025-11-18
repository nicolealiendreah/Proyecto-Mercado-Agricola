<?php

namespace App\Http\Controllers;

use App\Models\Organico;
use App\Models\Unidad;
use App\Models\EstadoProducto;
use Illuminate\Http\Request;

class OrganicoController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');

        $organicos = Organico::with(['unidad', 'estado'])
            ->when($q, function ($query, $q) {
                $query->where('nombre', 'ILIKE', "%$q%");
            })
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('organicos.index', compact('organicos', 'q'));
    }

    public function create()
    {
        $unidades = Unidad::orderBy('nombre')->get();
        $estados  = EstadoProducto::orderBy('nombre')->get();

        return view('organicos.create', compact('unidades', 'estados'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'        => 'required|string|max:255',
            'precio'        => 'required|numeric|min:0',
            'stock'         => 'required|integer|min:0',
            'fecha_cosecha' => 'nullable|date',
            'descripcion'   => 'nullable|string',
            'unidad_id'     => 'required|exists:unidades,id',
            'estado_id'     => 'required|exists:estado_productos,id',
        ]);

        Organico::create($data);

        return redirect()->route('organicos.index')
            ->with('ok', 'Orgánico creado');
    }

    public function show(Organico $organico)
    {
        $organico->load(['unidad', 'estado']);

        return view('organicos.show', compact('organico'));
    }

    public function edit(Organico $organico)
    {
        $unidades = Unidad::orderBy('nombre')->get();
        $estados  = EstadoProducto::orderBy('nombre')->get();

        return view('organicos.edit', compact('organico', 'unidades', 'estados'));
    }

    public function update(Request $request, Organico $organico)
    {
        $data = $request->validate([
            'nombre'        => 'required|string|max:255',
            'precio'        => 'required|numeric|min:0',
            'stock'         => 'required|integer|min:0',
            'fecha_cosecha' => 'nullable|date',
            'descripcion'   => 'nullable|string',
            'unidad_id'     => 'required|exists:unidades,id',
            'estado_id'     => 'required|exists:estado_productos,id',
        ]);

        $organico->update($data);

        return redirect()->route('organicos.index')
            ->with('ok', 'Orgánico actualizado');
    }

    public function destroy(Organico $organico)
    {
        $organico->delete();

        return redirect()->route('organicos.index')
            ->with('ok', 'Orgánico eliminado');
    }
}

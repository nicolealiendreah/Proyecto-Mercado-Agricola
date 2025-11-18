<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Especie;
use App\Models\Raza;
use App\Models\Unidad;
use App\Models\EstadoProducto;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');

        $animales = Animal::with(['especie', 'raza', 'unidad', 'estado'])
            ->when($q, function ($query, $q) {
                $query->where('nombre', 'ILIKE', "%$q%");
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('animales.index', compact('animales', 'q'));
    }

    public function create()
    {
        $especies = Especie::orderBy('nombre')->get();
        $razas    = Raza::orderBy('nombre')->get();
        $unidades = Unidad::orderBy('nombre')->get();
        $estados  = EstadoProducto::orderBy('nombre')->get();

        return view('animales.create', compact('especies', 'razas', 'unidades', 'estados'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'           => 'required|string|max:255',
            'especie_id'       => 'required|exists:especies,id',
            'raza_id'          => 'nullable|exists:razas,id',
            'unidad_id'        => 'required|exists:unidades,id',
            'estado_id'        => 'required|exists:estado_productos,id',
            'precio'           => 'required|numeric|min:0',
            'stock'            => 'required|integer|min:0',
            'fecha_nacimiento' => 'nullable|date',
            'descripcion'      => 'nullable|string',
        ]);

        Animal::create($data);

        return redirect()->route('animales.index')
            ->with('success', 'Animal registrado correctamente.');
    }

    public function edit(Animal $animale)
    {
        $especies = Especie::orderBy('nombre')->get();
        $razas    = Raza::orderBy('nombre')->get();
        $unidades = Unidad::orderBy('nombre')->get();
        $estados  = EstadoProducto::orderBy('nombre')->get();

        return view('animales.edit', [
            'animal'   => $animale,
            'especies' => $especies,
            'razas'    => $razas,
            'unidades' => $unidades,
            'estados'  => $estados,
        ]);
    }

    public function update(Request $request, Animal $animale)
    {
        $data = $request->validate([
            'nombre'           => 'required|string|max:255',
            'especie_id'       => 'required|exists:especies,id',
            'raza_id'          => 'nullable|exists:razas,id',
            'unidad_id'        => 'required|exists:unidades,id',
            'estado_id'        => 'required|exists:estado_productos,id',
            'precio'           => 'required|numeric|min:0',
            'stock'            => 'required|integer|min:0',
            'fecha_nacimiento' => 'nullable|date',
            'descripcion'      => 'nullable|string',
        ]);

        $animale->update($data);

        return redirect()->route('animales.index')
            ->with('success', 'Animal actualizado correctamente.');
    }

    public function destroy(Animal $animale)
    {
        $animale->delete();

        return redirect()->route('animales.index')
            ->with('success', 'Animal eliminado correctamente.');
    }
}

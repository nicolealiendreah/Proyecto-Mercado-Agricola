<?php

namespace App\Http\Controllers;

use App\Models\Organico;
use App\Models\Param;
use Illuminate\Support\Str;
use App\Http\Requests\StoreOrganicoRequest;
use App\Http\Requests\UpdateOrganicoRequest;

class OrganicoController extends Controller
{
    public function index()
    {
        $q = request('q');

        $organicos = Organico::with(['categoriaParam','variedadParam','unidadParam','estadoParam'])
            ->when($q, fn($qb) =>
                $qb->where(function($w) use ($q){
                    $w->where('nombre','ilike',"%$q%")
                      ->orWhere('categoria','ilike',"%$q%"); // compat con campo texto
                })
            )
            ->orderBy('id','desc')
            ->paginate(10)
            ->withQueryString();

        return view('organicos.index', compact('organicos','q'));
    }

    public function create()
    {
        return view('organicos.create', [
            'categorias' => Param::grupo('cat_organico')->get(),
            'estados'    => Param::grupo('estado_organico')->get(),
            'unidades'   => Param::grupo('unidad')->get(),
            'variedades' => collect(), // se carga por AJAX al elegir categoría
        ]);
    }

    public function store(StoreOrganicoRequest $request)
    {
        $data = $request->validated();

        $cat  = Param::find($data['categoria_id'] ?? null);
        $var  = Param::find($data['variedad_id']  ?? null);
        $uni  = Param::find($data['unidad_id']    ?? null);
        $est  = Param::find($data['estado_id']    ?? null);

        // Rellenar columnas antiguas (texto) si existen y/o son NOT NULL
        $data['categoria'] = $data['categoria'] ?? ($cat?->nombre ?? '');
        // si tuvieras otras columnas antiguas como 'estado' o 'unidad' en texto:
        if (!isset($data['estado']) && $est)  $data['estado']  = Str::slug($est->nombre, '_');
        if (!isset($data['unidad']) && $uni)  $data['unidad']  = $uni->nombre;

        Organico::create($data);
        return redirect()->route('organicos.index')->with('ok','Orgánico creado');
    }

    public function show(Organico $organico)
    {
        $organico->load(['categoriaParam','variedadParam','unidadParam','estadoParam']);
        return view('organicos.show', compact('organico'));
    }

    public function edit(Organico $organico)
    {
        return view('organicos.edit', [
            'organico'   => $organico,
            'categorias' => Param::grupo('cat_organico')->get(),
            'estados'    => Param::grupo('estado_organico')->get(),
            'unidades'   => Param::grupo('unidad')->get(),
            'variedades' => $organico->categoria_id
                               ? Param::grupo('var_organico')->hijosDe($organico->categoria_id)->get()
                               : collect(),
        ]);
    }

    public function update(UpdateOrganicoRequest $request, Organico $organico)
    {
        $data = $request->validated();

        $cat  = Param::find($data['categoria_id'] ?? null);
        $var  = Param::find($data['variedad_id']  ?? null);
        $uni  = Param::find($data['unidad_id']    ?? null);
        $est  = Param::find($data['estado_id']    ?? null);

        $data['categoria'] = $data['categoria'] ?? ($cat?->nombre ?? $organico->categoria);
        if (!isset($data['estado']) && $est)  $data['estado'] = Str::slug($est->nombre, '_');
        if (!isset($data['unidad']) && $uni)  $data['unidad'] = $uni->nombre;

        $organico->update($data);
        return redirect()->route('organicos.index')->with('ok','Orgánico actualizado');
    }

    public function destroy(Organico $organico)
    {
        $organico->delete();
        return redirect()->route('organicos.index')->with('ok','Orgánico eliminado');
    }
}

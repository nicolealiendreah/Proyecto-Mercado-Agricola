<?php

namespace App\Http\Controllers;

use App\Models\Maquinaria;
use App\Models\Param; 
use App\Http\Requests\StoreMaquinariaRequest;
use App\Http\Requests\UpdateMaquinariaRequest;
use Illuminate\Support\Str;


class MaquinariaController extends Controller
{
    public function index()
    {
        $q = request('q');

        $maquinarias = Maquinaria::with(['tipoParam','marcaParam','modeloParam','estadoParam'])
            ->when($q, fn($qb) =>
                $qb->where(function($w) use ($q){
                    $w->where('nombre','ilike',"%$q%")
                      ->orWhere('tipo','ilike',"%$q%")   
                      ->orWhere('marca','ilike',"%$q%");
                })
            )
            ->orderBy('id','desc')
            ->paginate(10)
            ->withQueryString();

        return view('maquinarias.index', compact('maquinarias','q'));
    }

    public function create()
    {
        $tipos   = Param::grupo('tipo_maquinaria')->get();
        $estados = Param::grupo('estado_maquinaria')->get();

        $marcas  = collect();
        $modelos = collect();

        return view('maquinarias.create', compact('tipos','estados','marcas','modelos'));
    }

    public function store(StoreMaquinariaRequest $request)
{
    $data = $request->validated();

    $tipo   = Param::find($data['tipo_id'] ?? null);
    $marca  = Param::find($data['marca_id'] ?? null);
    $modelo = Param::find($data['modelo_id'] ?? null);
    $estado = Param::find($data['estado_id'] ?? null);

    $data['tipo']   = $data['tipo']   ?? ($tipo?->nombre ?? '');
    $data['marca']  = $data['marca']  ?? ($marca?->nombre ?? '');
    $data['modelo'] = $data['modelo'] ?? ($modelo?->nombre ?? '');
    $data['estado'] = $data['estado'] ?? ($estado ? Str::slug($estado->nombre, '_') : 'disponible');

    Maquinaria::create($data);
    return redirect()->route('maquinarias.index')->with('ok','Maquinaria creada');
}

    public function show(Maquinaria $maquinaria)
    {
        $maquinaria->load(['tipoParam','marcaParam','modeloParam','estadoParam']);
        return view('maquinarias.show', compact('maquinaria'));
    }

    public function edit(Maquinaria $maquinaria)
    {
        $tipos   = Param::grupo('tipo_maquinaria')->get();
        $estados = Param::grupo('estado_maquinaria')->get();

        $marcas  = $maquinaria->tipo_id
                    ? Param::grupo('marca_maquinaria')->hijosDe($maquinaria->tipo_id)->get()
                    : collect();

        $modelos = $maquinaria->marca_id
                    ? Param::grupo('modelo_maquinaria')->hijosDe($maquinaria->marca_id)->get()
                    : collect();

        return view('maquinarias.edit', compact('maquinaria','tipos','estados','marcas','modelos'));
    }

    public function update(UpdateMaquinariaRequest $request, Maquinaria $maquinaria)
{
    $data = $request->validated();

    $tipo   = Param::find($data['tipo_id'] ?? null);
    $marca  = Param::find($data['marca_id'] ?? null);
    $modelo = Param::find($data['modelo_id'] ?? null);
    $estado = Param::find($data['estado_id'] ?? null);

    $data['tipo']   = $data['tipo']   ?? ($tipo?->nombre ?? $maquinaria->tipo);
    $data['marca']  = $data['marca']  ?? ($marca?->nombre ?? $maquinaria->marca);
    $data['modelo'] = $data['modelo'] ?? ($modelo?->nombre ?? $maquinaria->modelo);
    $data['estado'] = $data['estado'] ?? ($estado ? Str::slug($estado->nombre, '_') : $maquinaria->estado);

    $maquinaria->update($data);
    return redirect()->route('maquinarias.index')->with('ok','Maquinaria actualizada');
}

    public function destroy(Maquinaria $maquinaria)
    {
        $maquinaria->delete();
        return redirect()->route('maquinarias.index')->with('ok','Maquinaria eliminada');
    }
}

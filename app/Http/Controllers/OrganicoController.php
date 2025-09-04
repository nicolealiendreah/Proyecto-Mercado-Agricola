<?php

namespace App\Http\Controllers;

use App\Models\Organico;
use App\Http\Requests\StoreOrganicoRequest;
use App\Http\Requests\UpdateOrganicoRequest;

class OrganicoController extends Controller
{
    public function index()
    {
        $q = request('q');
        $organicos = Organico::when($q, fn($qb) =>
                $qb->where('nombre','ilike',"%$q%")
                   ->orWhere('categoria','ilike',"%$q%"))
            ->orderBy('id','desc')
            ->paginate(10)
            ->withQueryString();

        return view('organicos.index', compact('organicos','q'));
    }

    public function create()
    {
        return view('organicos.create');
    }

    public function store(StoreOrganicoRequest $request)
    {
        Organico::create($request->validated());
        return redirect()->route('organicos.index')->with('ok','Orgánico creado');
    }

    public function show(Organico $organico)
    {
        return view('organicos.show', compact('organico'));
    }

    public function edit(Organico $organico)
    {
        return view('organicos.edit', compact('organico'));
    }

    public function update(UpdateOrganicoRequest $request, Organico $organico)
    {
        $organico->update($request->validated());
        return redirect()->route('organicos.index')->with('ok','Orgánico actualizado');
    }

    public function destroy(Organico $organico)
    {
        $organico->delete();
        return redirect()->route('organicos.index')->with('ok','Orgánico eliminado');
    }
}


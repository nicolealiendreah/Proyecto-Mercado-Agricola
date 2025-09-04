<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
        $ads = Ad::with('category')->latest()->paginate(10);
        return view('ads.index', compact('ads'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('ads.create', compact('categories'));
    }

public function store(Request $request)
{
    $data = $request->validate([
        'category_id' => ['required','exists:categories,id'],
        'title'       => ['required','max:150'],
        'description' => ['nullable'],
        'price'       => ['nullable','numeric'],
        'city'        => ['nullable','max:100'],
    ]);

    Ad::create($data);

    return redirect()->route('ads.index')->with('ok', 'Anuncio creado');
}
    public function show(Ad $ad)
    {
        $ad->load('category');
        return view('ads.show', compact('ad'));
    }

    public function edit(Ad $ad)
    {
        $categories = Category::orderBy('name')->get();
        return view('ads.edit', compact('ad','categories'));
    }

    public function update(Request $request, Ad $ad)
    {
        $data = $request->validate([
            'category_id'   => ['required','exists:categories,id'],
            'title'         => ['required','max:150'],
            'description'   => ['nullable'],
            'price'         => ['nullable','numeric'],
            'city'          => ['nullable','max:100'],
            'contact_phone' => ['nullable','max:30'],
            'status'        => ['required','in:activo,inactivo'],
        ]);

        $ad->update($data);
        return redirect()->route('ads.index')->with('ok','Anuncio actualizado');
    }

    public function destroy(Ad $ad)
    {
        $ad->delete();
        return redirect()->route('ads.index')->with('ok','Anuncio eliminado');
    }
}
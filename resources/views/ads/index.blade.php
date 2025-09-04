@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h3 mb-0">Anuncios</h1>
  <a class="btn btn-primary" href="{{ route('ads.create') }}">Nuevo anuncio</a>
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Título</th>
      <th>Categoría</th>
      <th class="text-end">Precio</th>
      <th class="text-end">Acciones</th>
    </tr>
  </thead>
  <tbody>
  @forelse($ads as $ad)
    <tr>
      <td>{{ $ad->id }}</td>
      <td><a href="{{ route('ads.show',$ad) }}">{{ $ad->title }}</a></td>
      <td>{{ $ad->category->name ?? '-' }}</td>
      <td class="text-end">{{ number_format($ad->price ?? 0, 2) }}</td>
      <td class="text-end">
        <a class="btn btn-sm btn-warning" href="{{ route('ads.edit',$ad) }}">Editar</a>
        <form action="{{ route('ads.destroy',$ad) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar?');">
          @csrf @method('DELETE')
          <button class="btn btn-sm btn-danger">Eliminar</button>
        </form>
      </td>
    </tr>
  @empty
    <tr><td colspan="5">Sin registros</td></tr>
  @endforelse
  </tbody>
</table>

{{ $ads->links() }}
@endsection

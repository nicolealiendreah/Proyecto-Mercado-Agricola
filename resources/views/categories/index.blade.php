@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h3 mb-0">Categorías</h1>
  <a class="btn btn-primary" href="{{ route('categories.create') }}">Nueva categoría</a>
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Slug</th>
      <th class="text-end">Acciones</th>
    </tr>
  </thead>
  <tbody>
  @forelse($categories as $category)
    <tr>
      <td>{{ $category->id }}</td>
      <td>
        <a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a>
      </td>
      <td>{{ $category->slug }}</td>
      <td class="text-end">
        <a class="btn btn-sm btn-warning" href="{{ route('categories.edit', $category) }}">Editar</a>
        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar?');">
          @csrf @method('DELETE')
          <button class="btn btn-sm btn-danger">Eliminar</button>
        </form>
      </td>
    </tr>
  @empty
    <tr>
      <td colspan="4" class="text-muted">Sin registros</td>
    </tr>
  @endforelse
  </tbody>
</table>

{{ $categories->links() }}
@endsection

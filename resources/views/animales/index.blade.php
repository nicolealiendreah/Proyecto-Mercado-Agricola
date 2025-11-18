@extends('layouts.adminlte')

@section('title', 'Animales')
@section('page_title', 'Animales')

@section('content')
<div class="card">
  <div class="card-header d-flex align-items-center">
    <h3 class="card-title mb-0 mr-auto">Listado</h3>

    <form method="get" class="form-inline">
      <div class="input-group input-group-sm mr-2">
        <input type="text" name="q" value="{{ $q ?? '' }}" class="form-control" placeholder="Buscar...">
        <div class="input-group-append">
          <button class="btn btn-primary">Buscar</button>
        </div>
      </div>
    </form>

    <a href="{{ route('animales.create') }}" class="btn btn-success btn-sm">Nuevo</a>
  </div>

  <div class="card-body p-0">
    <table class="table table-striped mb-0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Especie</th>
          <th>Raza</th>
          <th>Unidad</th>
          <th>Estado</th>
          <th>Precio</th>
          <th>Stock</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse($animales as $animal)
          <tr>
            <td>{{ $animal->id }}</td>
            <td>{{ $animal->nombre }}</td>
            <td>{{ $animal->especie?->nombre }}</td>
            <td>{{ $animal->raza?->nombre }}</td>
            <td>{{ $animal->unidad?->nombre }}</td>
            <td>{{ $animal->estado?->nombre }}</td>
            <td>{{ $animal->precio }}</td>
            <td>{{ $animal->stock }}</td>
            <td class="text-nowrap">
              <a href="{{ route('animales.edit', $animal) }}" class="btn btn-sm btn-primary">Editar</a>
              <form action="{{ route('animales.destroy', $animal) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')">Eliminar</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="9" class="text-center">No hay registros</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="card-footer">
    {{ $animales->links() }}
  </div>
</div>
@endsection

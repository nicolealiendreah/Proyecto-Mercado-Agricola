@extends('layouts.adminlte')

@section('title', 'Orgánicos')
@section('page_title', 'Orgánicos')

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

    <a href="{{ route('organicos.create') }}" class="btn btn-success btn-sm">Nuevo</a>
  </div>

  <div class="card-body p-0">
    <table class="table table-striped mb-0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Unidad</th>
          <th>Estado</th>
          <th>Precio</th>
          <th>Stock</th>
          <th>Fecha cosecha</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse($organicos as $org)
          <tr>
            <td>{{ $org->id }}</td>
            <td>{{ $org->nombre }}</td>
            <td>{{ $org->unidad?->nombre }}</td>
            <td>{{ $org->estado?->nombre }}</td>
            <td>{{ $org->precio }}</td>
            <td>{{ $org->stock }}</td>
            <td>{{ $org->fecha_cosecha }}</td>
            <td class="text-nowrap">
              <a href="{{ route('organicos.edit', $org) }}" class="btn btn-sm btn-primary">Editar</a>
              <form action="{{ route('organicos.destroy', $org) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')">Eliminar</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="8" class="text-center">No hay registros</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="card-footer">
    {{ $organicos->links() }}
  </div>
</div>
@endsection

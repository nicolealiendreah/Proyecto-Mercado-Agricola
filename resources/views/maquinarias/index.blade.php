@extends('layouts.adminlte')

@section('title','Maquinarias')
@section('page_title','Maquinarias')

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

    <a href="{{ route('maquinarias.create') }}" class="btn btn-success btn-sm">Nueva</a>
  </div>

  <div class="card-body p-0">
    <table class="table table-striped mb-0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Marca</th>
          <th>Modelo</th>
          <th>Tipo</th>
          <th>Estado</th>
          <th>Precio/día</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse($maquinarias as $maq)
          <tr>
            <td>{{ $maq->id }}</td>
            <td>{{ $maq->nombre }}</td>
            <td>{{ $maq->marca }}</td>
            <td>{{ $maq->modelo }}</td>
            <td>{{ $maq->tipoMaquinaria?->nombre }}</td>
            <td>{{ $maq->estado?->nombre }}</td>
            <td>{{ $maq->precio_dia }}</td>

            <td class="text-nowrap">
              <a href="{{ route('maquinarias.edit', $maq) }}" class="btn btn-sm btn-primary">Editar</a>

              <form action="{{ route('maquinarias.destroy', $maq) }}"
                    method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger"
                        onclick="return confirm('¿Eliminar esta maquinaria?')">
                  Eliminar
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="8" class="text-center">No hay registros</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="card-footer">
    {{ $maquinarias->links() }}
  </div>
</div>
@endsection

@extends('layouts.adminlte')

@section('title','Unidades')
@section('page_title','Unidades')

@section('content')
<div class="card">

  <div class="card-header d-flex align-items-center">
    <h3 class="card-title mb-0 mr-auto">Listado de Unidades</h3>

    <a href="{{ route('unidades.create') }}" class="btn btn-success btn-sm">
      Nueva Unidad
    </a>
  </div>

  <div class="card-body p-0">
    <table class="table table-striped mb-0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Símbolo</th>
          <th class="text-right">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @forelse($unidades as $unidad)
          <tr>
            <td>{{ $unidad->id }}</td>
            <td>{{ $unidad->nombre }}</td>
            <td>{{ $unidad->simbolo ?? '-' }}</td>
            <td class="text-right text-nowrap">
              <a href="{{ route('unidades.show', $unidad) }}" class="btn btn-sm btn-info">
                Ver
              </a>
              <a href="{{ route('unidades.edit', $unidad) }}" class="btn btn-sm btn-primary">
                Editar
              </a>

              <form action="{{ route('unidades.destroy', $unidad) }}"
                    method="POST"
                    class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger"
                        onclick="return confirm('¿Eliminar esta unidad?')">
                  Eliminar
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="4" class="text-center">No hay unidades registradas</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="card-footer">
    {{ $unidades->links() }}
  </div>

</div>
@endsection

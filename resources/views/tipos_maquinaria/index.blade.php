@extends('layouts.adminlte')

@section('title','Tipos de Maquinaria')
@section('page_title','Tipos de Maquinaria')

@section('content')
<div class="card">

  <div class="card-header d-flex align-items-center">
    <h3 class="card-title mb-0 mr-auto">Listado de Tipos de Maquinaria</h3>

    <a href="{{ route('tipos-maquinaria.create') }}" class="btn btn-success btn-sm">
      Nuevo Tipo
    </a>
  </div>

  <div class="card-body p-0">
    <table class="table table-striped mb-0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th class="text-right">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @forelse($tipos as $tipo)
          <tr>
            <td>{{ $tipo->id }}</td>
            <td>{{ $tipo->nombre }}</td>

            <td class="text-right text-nowrap">
              <a href="{{ route('tipos-maquinaria.show', $tipo) }}" class="btn btn-sm btn-info">
                Ver
              </a>

              <a href="{{ route('tipos-maquinaria.edit', $tipo) }}" class="btn btn-sm btn-primary">
                Editar
              </a>

              <form action="{{ route('tipos-maquinaria.destroy', $tipo) }}"
                    method="POST"
                    class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger"
                        onclick="return confirm('¿Eliminar este tipo?')">
                  Eliminar
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="3" class="text-center">No hay tipos registrados</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="card-footer">
    {{ $tipos->links() }}
  </div>

</div>
@endsection

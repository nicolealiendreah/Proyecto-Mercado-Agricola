@extends('layouts.adminlte')

@section('title','Especies')
@section('page_title','Especies')

@section('content')
<div class="card">
  <div class="card-header d-flex align-items-center">
    <h3 class="card-title mb-0 mr-auto">Listado de Especies</h3>

    <a href="{{ route('especies.create') }}" class="btn btn-success btn-sm">
      Nueva especie
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
        @forelse($especies as $especie)
          <tr>
            <td>{{ $especie->id }}</td>
            <td>{{ $especie->nombre }}</td>
            <td class="text-right text-nowrap">
              <a href="{{ route('especies.edit', $especie) }}" class="btn btn-sm btn-primary">
                Editar
              </a>

              <form action="{{ route('especies.destroy', $especie) }}"
                    method="POST"
                    class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger"
                        onclick="return confirm('¿Eliminar esta especie?')">
                  Eliminar
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="3" class="text-center">No hay especies registradas</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="card-footer">
    {{ $especies->links() }}
  </div>
</div>
@endsection

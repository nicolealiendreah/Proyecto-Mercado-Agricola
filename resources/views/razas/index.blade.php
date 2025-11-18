@extends('layouts.adminlte')

@section('title','Razas')
@section('page_title','Razas')

@section('content')
<div class="card">
  <div class="card-header d-flex align-items-center">
    <h3 class="card-title mb-0 mr-auto">Listado de Razas</h3>

    <a href="{{ route('razas.create') }}" class="btn btn-success btn-sm">
      Nueva raza
    </a>
  </div>

  <div class="card-body p-0">
    <table class="table table-striped mb-0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Especie</th>
          <th class="text-right">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @forelse($razas as $raza)
          <tr>
            <td>{{ $raza->id }}</td>
            <td>{{ $raza->nombre }}</td>
            <td>{{ $raza->especie?->nombre }}</td>
            <td class="text-right text-nowrap">
              <a href="{{ route('razas.show', $raza) }}" class="btn btn-sm btn-info">
                Ver
              </a>

              <a href="{{ route('razas.edit', $raza) }}" class="btn btn-sm btn-primary">
                Editar
              </a>

              <form action="{{ route('razas.destroy', $raza) }}"
                    method="POST"
                    class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger"
                        onclick="return confirm('¿Eliminar esta raza?')">
                  Eliminar
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="4" class="text-center">No hay razas registradas</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="card-footer">
    {{ $razas->links() }}
  </div>
</div>
@endsection

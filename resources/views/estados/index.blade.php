@extends('layouts.adminlte')

@section('title','Estados de Producto')
@section('page_title','Estados de Producto')

@section('content')
<div class="card">

  <div class="card-header d-flex align-items-center">
    <h3 class="card-title mb-0 mr-auto">Listado de Estados de Producto</h3>

    <a href="{{ route('estados-producto.create') }}" class="btn btn-success btn-sm">
      Nuevo Estado
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
        @forelse($estados as $estado)
          <tr>
            <td>{{ $estado->id }}</td>
            <td>{{ $estado->nombre }}</td>

            <td class="text-right text-nowrap">
              <a href="{{ route('estados-producto.show', $estado) }}" class="btn btn-sm btn-info">Ver</a>

              <a href="{{ route('estados-producto.edit', $estado) }}" class="btn btn-sm btn-primary">
                Editar
              </a>

              <form action="{{ route('estados-producto.destroy', $estado) }}"
                    method="POST"
                    class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger"
                        onclick="return confirm('¿Eliminar este estado?')">
                  Eliminar
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="3" class="text-center">No hay estados registrados</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="card-footer">
    {{ $estados->links() }}
  </div>

</div>
@endsection

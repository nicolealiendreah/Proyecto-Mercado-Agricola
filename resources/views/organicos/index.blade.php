@extends('layouts.adminlte')
@section('title','Orgánicos')
@section('page_title','Orgánicos')

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

    <a href="{{ route('organicos.create') }}" class="btn btn-success btn-sm mr-2">Nuevo</a>
    <a href="{{ route('maquinarias.index') }}" class="btn btn-info btn-sm">Ir a Maquinarias</a>
  </div>

  <div class="card-body p-0">
    @if(session('ok'))
      <div class="alert alert-success m-3">{{ session('ok') }}</div>
    @endif

    <div class="table-responsive">
      <table class="table table-hover mb-0">
        <thead class="thead-light">
          <tr>
            <th>#</th><th>Nombre</th><th>Categoría</th><th>Precio</th><th>Stock</th>
            <th class="text-right pr-3">Acciones</th>
          </tr>
        </thead>
        <tbody>
        @forelse($organicos as $o)
          <tr>
            <td>{{ $o->id }}</td>
            <td><a href="{{ route('organicos.show',$o) }}">{{ $o->nombre }}</a></td>
            <td>{{ $o->categoria }}</td>
            <td>{{ number_format($o->precio,2) }}</td>
            <td>{{ $o->stock }}</td>
            <td class="text-right pr-3">
              <a href="{{ route('organicos.edit',$o) }}" class="btn btn-sm btn-primary">Editar</a>
              <form action="{{ route('organicos.destroy',$o) }}" method="post" class="d-inline">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')">Eliminar</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" class="text-center text-muted">Sin registros</td></tr>
        @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <div class="card-footer">
    {{ $organicos->appends(['q'=>$q ?? null])->links() }}
  </div>
</div>
@endsection

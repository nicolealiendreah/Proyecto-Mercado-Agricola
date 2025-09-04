@extends('layouts.gentelella')
@section('content')
<div class="x_panel">
  <div class="x_title"><h2>Orgánicos</h2></div>
  <div class="x_content">
    @if(session('ok')) <div class="alert alert-success">{{ session('ok') }}</div> @endif

    <div class="d-flex mb-2">
      <form method="get" class="form-inline">
        <input type="text" name="q" value="{{ $q }}" class="form-control" placeholder="Buscar...">
        <button class="btn btn-primary ml-2">Buscar</button>
      </form>
      <a href="{{ route('organicos.create') }}" class="btn btn-success ml-3">Nuevo</a>
      <a href="{{ route('maquinarias.index') }}" class="btn btn-info ml-3">Ir a Maquinarias</a>
    </div>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th><th>Nombre</th><th>Categoría</th><th>Precio</th><th>Stock</th><th></th>
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
          <td class="text-right">
            <a href="{{ route('organicos.edit',$o) }}" class="btn btn-sm btn-primary">Editar</a>
            <form action="{{ route('organicos.destroy',$o) }}" method="post" class="d-inline">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')">Eliminar</button>
            </form>
          </td>
        </tr>
        @empty
        <tr><td colspan="6">Sin registros</td></tr>
        @endforelse
      </tbody>
    </table>

    {{ $organicos->links() }}
  </div>
</div>
@endsection

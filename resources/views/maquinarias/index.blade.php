@extends('layouts.gentelella')
@section('content')
<div class="x_panel">
  <div class="x_title"><h2>Maquinarias</h2></div>
  <div class="x_content">
    @if(session('ok')) <div class="alert alert-success">{{ session('ok') }}</div> @endif

    <div class="d-flex mb-2">
      <form method="get" class="form-inline">
        <input type="text" name="q" value="{{ $q }}" class="form-control" placeholder="Buscar...">
        <button class="btn btn-primary ml-2">Buscar</button>
      </form>
      <a href="{{ route('maquinarias.create') }}" class="btn btn-success ml-3">Nueva</a>
      <a href="{{ route('organicos.index') }}" class="btn btn-info ml-3">Ir a Orgánicos</a>
    </div>

    <table class="table table-striped">
      <thead><tr>
        <th>#</th><th>Nombre</th><th>Tipo</th><th>Marca</th><th>Precio/día</th><th>Estado</th><th></th>
      </tr></thead>
      <tbody>
      @forelse($maquinarias as $m)
        <tr>
          <td>{{ $m->id }}</td>
          <td><a href="{{ route('maquinarias.show',$m) }}">{{ $m->nombre }}</a></td>
          <td>{{ $m->tipo }}</td>
          <td>{{ $m->marca }}</td>
          <td>{{ number_format($m->precio_dia,2) }}</td>
          <td>{{ $m->estado }}</td>
          <td class="text-right">
            <a href="{{ route('maquinarias.edit',$m) }}" class="btn btn-sm btn-primary">Editar</a>
            <form action="{{ route('maquinarias.destroy',$m) }}" method="post" class="d-inline">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')">Eliminar</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="7">Sin registros</td></tr>
      @endforelse
      </tbody>
    </table>

    {{ $maquinarias->links() }}
  </div>
</div>
@endsection

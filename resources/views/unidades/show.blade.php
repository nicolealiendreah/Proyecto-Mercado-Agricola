@extends('layouts.adminlte')

@section('title','Detalle de Unidad')
@section('page_title','Detalle de Unidad')

@section('content')
<div class="card">

  <div class="card-header">
    <h3 class="card-title mb-0">Detalle de Unidad</h3>
  </div>

  <div class="card-body">
    <dl class="row">
      <dt class="col-sm-3">ID</dt>
      <dd class="col-sm-9">{{ $unidad->id }}</dd>

      <dt class="col-sm-3">Nombre</dt>
      <dd class="col-sm-9">{{ $unidad->nombre }}</dd>

      <dt class="col-sm-3">Símbolo</dt>
      <dd class="col-sm-9">{{ $unidad->simbolo ?? '-' }}</dd>
    </dl>

    <a href="{{ route('unidades.index') }}" class="btn btn-secondary">Volver</a>
  </div>

</div>
@endsection

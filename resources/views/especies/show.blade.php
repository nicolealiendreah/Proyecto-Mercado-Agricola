@extends('layouts.adminlte')

@section('title','Detalle de Especie')
@section('page_title','Detalle de Especie')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title mb-0">Detalle de Especie</h3>
  </div>

  <div class="card-body">
    <dl class="row">
      <dt class="col-sm-3">ID</dt>
      <dd class="col-sm-9">{{ $especie->id }}</dd>

      <dt class="col-sm-3">Nombre</dt>
      <dd class="col-sm-9">{{ $especie->nombre }}</dd>

      <dt class="col-sm-3">Activo</dt>
      <dd class="col-sm-9">{{ $especie->activo ? 'Sí' : 'No' }}</dd>
    </dl>

    <a href="{{ route('especies.index') }}" class="btn btn-secondary">Volver</a>
  </div>
</div>
@endsection

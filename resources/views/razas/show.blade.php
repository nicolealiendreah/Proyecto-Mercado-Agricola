@extends('layouts.adminlte')

@section('title','Detalle de Raza')
@section('page_title','Detalle de Raza')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title mb-0">Detalle de Raza</h3>
  </div>

  <div class="card-body">
    <dl class="row">
      <dt class="col-sm-3">ID</dt>
      <dd class="col-sm-9">{{ $raza->id }}</dd>

      <dt class="col-sm-3">Nombre</dt>
      <dd class="col-sm-9">{{ $raza->nombre }}</dd>

      <dt class="col-sm-3">Especie</dt>
      <dd class="col-sm-9">{{ $raza->especie?->nombre }}</dd>
    </dl>

    <a href="{{ route('razas.index') }}" class="btn btn-secondary">Volver</a>
  </div>
</div>
@endsection

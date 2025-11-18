@extends('layouts.adminlte')

@section('title','Detalle Tipo de Maquinaria')
@section('page_title','Detalle Tipo de Maquinaria')

@section('content')
<div class="card">

  <div class="card-header">
    <h3 class="card-title mb-0">Detalle del Tipo de Maquinaria</h3>
  </div>

  <div class="card-body">
    <dl class="row">
      <dt class="col-sm-3">ID</dt>
      <dd class="col-sm-9">{{ $tipo->id }}</dd>

      <dt class="col-sm-3">Nombre</dt>
      <dd class="col-sm-9">{{ $tipo->nombre }}</dd>
    </dl>

    <a href="{{ route('tipos-maquinaria.index') }}" class="btn btn-secondary">Volver</a>
  </div>

</div>
@endsection

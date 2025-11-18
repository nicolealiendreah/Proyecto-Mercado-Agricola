@extends('layouts.adminlte')

@section('title', 'Detalle de Maquinaria')
@section('page_title', 'Detalle de Maquinaria')

@section('content')
<div class="x_panel">
  <div class="x_title">
    <h2>Detalle de Maquinaria</h2>
  </div>

  <div class="x_content">
    <dl class="row">

      <dt class="col-sm-3">Nombre</dt>
      <dd class="col-sm-9">{{ $maquinaria->nombre }}</dd>

      <dt class="col-sm-3">Tipo de Maquinaria</dt>
      <dd class="col-sm-9">{{ $maquinaria->tipoMaquinaria?->nombre }}</dd>

      <dt class="col-sm-3">Marca</dt>
      <dd class="col-sm-9">{{ $maquinaria->marca }}</dd>

      <dt class="col-sm-3">Modelo</dt>
      <dd class="col-sm-9">{{ $maquinaria->modelo }}</dd>

      <dt class="col-sm-3">Precio por día</dt>
      <dd class="col-sm-9">{{ number_format($maquinaria->precio_dia, 2) }}</dd>

      <dt class="col-sm-3">Estado</dt>
      <dd class="col-sm-9">{{ $maquinaria->estado?->nombre }}</dd>

      <dt class="col-sm-3">Descripción</dt>
      <dd class="col-sm-9">{{ $maquinaria->descripcion }}</dd>

    </dl>

    <a class="btn btn-secondary" href="{{ route('maquinarias.index') }}">Volver</a>
  </div>
</div>
@endsection

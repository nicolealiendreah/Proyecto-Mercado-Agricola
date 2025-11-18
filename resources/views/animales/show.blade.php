@extends('layouts.adminlte')
@section('title','Animales')
@section('page_title','Animales')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title mb-0">Detalle del Animal</h3>
  </div>

  <div class="card-body">
    <dl class="row">
      <dt class="col-sm-2">ID</dt>
      <dd class="col-sm-10">{{ $animal->id }}</dd>

      <dt class="col-sm-2">Nombre</dt>
      <dd class="col-sm-10">{{ $animal->nombre }}</dd>

      <dt class="col-sm-2">Especie</dt>
      <dd class="col-sm-10">{{ $animal->especie->nombre ?? '' }}</dd>

      <dt class="col-sm-2">Raza</dt>
      <dd class="col-sm-10">{{ $animal->raza->nombre ?? '-' }}</dd>

      <dt class="col-sm-2">Unidad</dt>
      <dd class="col-sm-10">{{ $animal->unidad->nombre ?? '' }}</dd>

      <dt class="col-sm-2">Estado</dt>
      <dd class="col-sm-10">{{ $animal->estado->nombre ?? '' }}</dd>

      <dt class="col-sm-2">Precio</dt>
      <dd class="col-sm-10">{{ number_format($animal->precio, 2) }}</dd>

      <dt class="col-sm-2">Stock</dt>
      <dd class="col-sm-10">{{ $animal->stock }}</dd>

      <dt class="col-sm-2">Fecha nacimiento</dt>
      <dd class="col-sm-10">{{ $animal->fecha_nacimiento ?? '-' }}</dd>

      <dt class="col-sm-2">Descripción</dt>
      <dd class="col-sm-10">{{ $animal->descripcion ?? '-' }}</dd>
    </dl>

    <a class="btn btn-secondary" href="{{ route('animales.index') }}">Volver</a>
  </div>
</div>
@endsection

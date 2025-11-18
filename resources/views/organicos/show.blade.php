@extends('layouts.adminlte')

@section('title','Detalle Orgánico')
@section('page_title','Detalle Orgánico')

@section('content')
<div class="x_panel">
  <div class="x_title">
    <h2>Detalle del Producto Orgánico</h2>
  </div>

  <div class="x_content">
    <dl class="row">

      <dt class="col-sm-2">Nombre</dt>
      <dd class="col-sm-10">{{ $organico->nombre }}</dd>

      <dt class="col-sm-2">Unidad</dt>
      <dd class="col-sm-10">{{ $organico->unidad->nombre ?? '-' }}</dd>

      <dt class="col-sm-2">Estado</dt>
      <dd class="col-sm-10">{{ $organico->estado->nombre ?? '-' }}</dd>

      <dt class="col-sm-2">Precio</dt>
      <dd class="col-sm-10">{{ number_format($organico->precio,2) }}</dd>

      <dt class="col-sm-2">Stock</dt>
      <dd class="col-sm-10">{{ $organico->stock }}</dd>

      <dt class-sm-2">Fecha de cosecha</dt>
      <dd class="col-sm-10">{{ $organico->fecha_cosecha ?? '-' }}</dd>

      <dt class="col-sm-2">Descripción</dt>
      <dd class="col-sm-10">{{ $organico->descripcion ?? '-' }}</dd>

    </dl>

    <a class="btn btn-secondary" href="{{ route('organicos.index') }}">Volver</a>
  </div>
</div>
@endsection

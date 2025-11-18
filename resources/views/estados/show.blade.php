@extends('layouts.adminlte')

@section('title','Detalle Estado')
@section('page_title','Detalle Estado')

@section('content')
<div class="card">

  <div class="card-header">
    <h3 class="card-title mb-0">Detalle del Estado</h3>
  </div>

  <div class="card-body">
    <dl class="row">
      <dt class="col-sm-3">ID</dt>
      <dd class="col-sm-9">{{ $estado->id }}</dd>

      <dt class="col-sm-3">Nombre</dt>
      <dd class="col-sm-9">{{ $estado->nombre }}</dd>
    </dl>

    <a href="{{ route('estados-producto.index') }}" class="btn btn-secondary">Volver</a>
  </div>

</div>
@endsection

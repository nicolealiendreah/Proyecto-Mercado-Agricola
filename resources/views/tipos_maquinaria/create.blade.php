@extends('layouts.adminlte')

@section('title','Nuevo Tipo de Maquinaria')
@section('page_title','Nuevo Tipo de Maquinaria')

@section('content')
<div class="card">
  <div class="card-body">

    <form action="{{ route('tipos-maquinaria.store') }}" method="POST">
      @include('tipos_maquinaria._form')

      <button class="btn btn-primary">Guardar</button>
      <a href="{{ route('tipos-maquinaria.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

  </div>
</div>
@endsection

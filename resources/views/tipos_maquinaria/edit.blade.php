@extends('layouts.adminlte')

@section('title','Editar Tipo de Maquinaria')
@section('page_title','Editar Tipo de Maquinaria')

@section('content')
<div class="card">
  <div class="card-body">

    <form action="{{ route('tipos-maquinaria.update', $tipo) }}" method="POST">
      @csrf
      @method('PUT')

      @include('tipos_maquinaria._form')

      <button class="btn btn-primary">Actualizar</button>
      <a href="{{ route('tipos-maquinaria.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

  </div>
</div>
@endsection

@extends('layouts.adminlte')

@section('title','Editar Maquinaria')
@section('page_title','Editar Maquinaria')

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('maquinarias.update', $maquinaria) }}" method="POST">
      @csrf
      @method('PUT')

      @include('maquinarias._form')

      <button class="btn btn-primary">Actualizar</button>
      <a href="{{ route('maquinarias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</div>
@endsection

@extends('layouts.adminlte')

@section('title','Nueva Maquinaria')
@section('page_title','Nueva Maquinaria')

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('maquinarias.store') }}" method="POST">
      @include('maquinarias._form')
      <button class="btn btn-primary">Guardar</button>
      <a href="{{ route('maquinarias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</div>
@endsection

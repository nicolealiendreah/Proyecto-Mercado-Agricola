@extends('layouts.adminlte')

@section('title','Nuevo Animal')
@section('page_title','Nuevo Animal')

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('animales.store') }}" method="POST">
      @include('animales._form')
      <button class="btn btn-primary">Guardar</button>
      <a href="{{ route('animales.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</div>
@endsection

@extends('layouts.adminlte')

@section('title','Editar Animal')
@section('page_title','Editar Animal')

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('animales.update', $animal) }}" method="POST">
      @method('PUT')
      @include('animales._form')
      <button class="btn btn-primary">Actualizar</button>
      <a href="{{ route('animales.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</div>
@endsection

@extends('layouts.adminlte')

@section('title','Editar raza')
@section('page_title','Editar raza')

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('razas.update', $raza) }}" method="POST">
      @csrf
      @method('PUT')

      @include('razas._form')

      <button class="btn btn-primary">Actualizar</button>
      <a href="{{ route('razas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</div>
@endsection

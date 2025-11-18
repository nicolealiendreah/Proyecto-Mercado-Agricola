@extends('layouts.adminlte')

@section('title','Editar Unidad')
@section('page_title','Editar Unidad')

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('unidades.update', $unidad) }}" method="POST">
      @csrf
      @method('PUT')

      @include('unidades._form')

      <button class="btn btn-primary">Actualizar</button>
      <a href="{{ route('unidades.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</div>
@endsection

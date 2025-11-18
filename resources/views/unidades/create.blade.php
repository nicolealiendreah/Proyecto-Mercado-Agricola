@extends('layouts.adminlte')

@section('title','Nueva Unidad')
@section('page_title','Nueva Unidad')

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('unidades.store') }}" method="POST">
      @include('unidades._form')

      <button class="btn btn-primary">Guardar</button>
      <a href="{{ route('unidades.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</div>
@endsection

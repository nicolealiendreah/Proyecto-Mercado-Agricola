@extends('layouts.adminlte')

@section('title','Nuevo Estado')
@section('page_title','Nuevo Estado')

@section('content')
<div class="card">
  <div class="card-body">

    <form action="{{ route('estados-producto.store') }}" method="POST">
      @include('estados._form')

      <button class="btn btn-primary">Guardar</button>
      <a href="{{ route('estados-producto.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

  </div>
</div>
@endsection

@extends('layouts.adminlte')

@section('title','Editar Estado')
@section('page_title','Editar Estado')

@section('content')
<div class="card">
  <div class="card-body">

    <form action="{{ route('estados-producto.update', $estado) }}" method="POST">
      @csrf
      @method('PUT')

      @include('estados._form')

      <button class="btn btn-primary">Actualizar</button>
      <a href="{{ route('estados-producto.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

  </div>
</div>
@endsection

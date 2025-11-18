@extends('layouts.adminlte')

@section('title','Editar Organico')
@section('page_title','Editar Organico')

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('organicos.update', $organico) }}" method="POST">
      @method('PUT')
      @include('organicos._form')
      <button class="btn btn-primary">Actualizar</button>
      <a href="{{ route('organicos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</div>
@endsection

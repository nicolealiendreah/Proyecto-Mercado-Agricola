@extends('layouts.adminlte')

@section('title','Editar especie')
@section('page_title','Editar especie')

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('especies.update', $especie) }}" method="POST">
      @csrf
      @method('PUT')

      @include('especies._form')

      <button class="btn btn-primary">Actualizar</button>
      <a href="{{ route('especies.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</div>
@endsection

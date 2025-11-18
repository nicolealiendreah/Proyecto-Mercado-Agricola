@extends('layouts.adminlte')

@section('title','Nuevo Organico')
@section('page_title','Nuevo Organico')

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('organicos.store') }}" method="POST">
      @include('organicos._form')
      <button class="btn btn-primary">Guardar</button>
      <a href="{{ route('organicos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</div>
@endsection

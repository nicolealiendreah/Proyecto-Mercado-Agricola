@extends('layouts.adminlte')

@section('title','Nueva raza')
@section('page_title','Nueva raza')

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('razas.store') }}" method="POST">
      @include('razas._form')

      <button class="btn btn-primary">Guardar</button>
      <a href="{{ route('razas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</div>
@endsection

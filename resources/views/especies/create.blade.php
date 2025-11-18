@extends('layouts.adminlte')

@section('title','Nueva especie')
@section('page_title','Nueva especie')

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('especies.store') }}" method="POST">
      @include('especies._form')

      <button class="btn btn-primary">Guardar</button>
      <a href="{{ route('especies.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</div>
@endsection

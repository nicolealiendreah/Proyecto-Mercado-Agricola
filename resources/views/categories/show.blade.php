@extends('layouts.app')

@section('title', 'Detalle de categoría')

@section('content')
<div class="container mt-4">
  @if(session('ok'))
    <div class="alert alert-success">{{ session('ok') }}</div>
  @endif

  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">Categoría: {{ $category->name }}</h1>
    <div class="d-flex gap-2">
      <a href="{{ route('categories.index') }}" class="btn btn-secondary">Volver</a>
      <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary">Editar</a>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <dl class="row mb-0">
        <dt class="col-sm-3">ID</dt>
        <dd class="col-sm-9">{{ $category->id }}</dd>

        <dt class="col-sm-3">Nombre</dt>
        <dd class="col-sm-9">{{ $category->name }}</dd>

        <dt class="col-sm-3">Slug</dt>
        <dd class="col-sm-9">{{ $category->slug }}</dd>

        <dt class="col-sm-3">Creado</dt>
        <dd class="col-sm-9">{{ $category->created_at }}</dd>

        <dt class="col-sm-3">Actualizado</dt>
        <dd class="col-sm-9">{{ $category->updated_at }}</dd>
      </dl>
    </div>
  </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h3 mb-0">Nueva categoría</h1>
</div>

@if(session('ok'))
  <div class="alert alert-success">{{ session('ok') }}</div>
@endif

<form action="{{ route('categories.store') }}" method="POST" class="card card-body gap-3">
  @csrf

  <div>
    <label class="form-label">Nombre</label>
    <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required>
    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
  </div>

  <div>
    <label class="form-label">Slug (opcional)</label>
    <input type="text" name="slug" value="{{ old('slug') }}" class="form-control">
    <small class="text-muted">Si lo dejas vacío se generará automáticamente.</small>
  </div>

  <div class="text-end">
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancelar</a>
    <button class="btn btn-primary" type="submit">Guardar</button>
  </div>
</form>
@endsection

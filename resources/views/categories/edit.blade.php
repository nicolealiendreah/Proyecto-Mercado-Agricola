@extends('layouts.app')

@section('title', 'Editar categoría')

@section('content')
<div class="container mt-4">
  @if(session('ok'))
    <div class="alert alert-success">{{ session('ok') }}</div>
  @endif

  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">Editar categoría</h1>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Volver</a>
  </div>

  <div class="card">
    <div class="card-body">
      <form action="{{ route('categories.update', $category) }}" method="POST" novalidate>
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="name" class="form-label">Nombre</label>
          <input
            type="text"
            id="name"
            name="name"
            class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name', $category->name) }}"
            maxlength="100"
            required
            autofocus
          >
          @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
          <div class="form-text">El slug se generará automáticamente.</div>
        </div>

        <div class="d-flex gap-2">
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
          <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">Cancelar</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

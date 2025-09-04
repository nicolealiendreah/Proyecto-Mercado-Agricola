@extends('layouts.app')
@section('content')
<h1 class="h3 mb-3">Nuevo anuncio</h1>

<form method="POST" action="{{ route('ads.store') }}" class="card card-body">
  @csrf

  <div class="mb-3">
    <label class="form-label">Categoría</label>
    <select name="category_id" class="form-select" required>
      <option value="">-- Selecciona --</option>
      @foreach($categories as $cat)
        <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
          {{ $cat->name }}
        </option>
      @endforeach
    </select>
    @error('category_id')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>

  <div class="mb-3">
    <label class="form-label">Título</label>
    <input name="title" class="form-control" value="{{ old('title') }}" maxlength="150" required>
    @error('title')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>

  <div class="mb-3">
    <label class="form-label">Descripción</label>
    <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
    @error('description')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>

  <div class="mb-3">
    <label class="form-label">Precio</label>
    <input type="number" name="price" class="form-control" step="0.01" value="{{ old('price') }}">
    @error('price')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>

  <div class="text-end">
    <a href="{{ route('ads.index') }}" class="btn btn-secondary">Cancelar</a>
    <button class="btn btn-primary">Guardar</button>
  </div>
</form>
@endsection

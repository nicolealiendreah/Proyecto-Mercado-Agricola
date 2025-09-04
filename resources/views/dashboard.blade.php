@extends('layouts.app')
@section('content')
<h1 class="h4 mb-4">Panel principal</h1>
<p class="text-muted mb-4">Elige una sección para administrar. Mantuvimos el diseño simple y claro.</p>

<div class="row g-3">
  <div class="col-12 col-md-6">
    <a href="{{ route('categories.index') }}" class="text-decoration-none">
      <div class="card shadow-sm h-100">
        <div class="card-body d-flex align-items-center justify-content-between">
          <div>
            <h2 class="h5 mb-1">Categorías</h2>
            <p class="mb-0 text-muted small">Crea, edita y elimina categorías.</p>
          </div>
          <span class="btn btn-outline-primary">Entrar</span>
        </div>
      </div>
    </a>
  </div>

  <div class="col-12 col-md-6">
    <a href="{{ route('ads.index') }}" class="text-decoration-none">
      <div class="card shadow-sm h-100">
        <div class="card-body d-flex align-items-center justify-content-between">
          <div>
            <h2 class="h5 mb-1">Anuncios</h2>
            <p class="mb-0 text-muted small">Publica y gestiona anuncios.</p>
          </div>
          <span class="btn btn-outline-primary">Entrar</span>
        </div>
      </div>
    </a>
  </div>
</div>

<form class="mt-4 text-end" method="POST" action="{{ route('logout') }}">
  @csrf
  <button class="btn btn-secondary">Cerrar sesión</button>
</form>
@endsection

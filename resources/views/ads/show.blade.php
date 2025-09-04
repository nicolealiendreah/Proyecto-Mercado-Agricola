@extends('layouts.app') {{-- si tu layout se llama distinto, cámbialo --}}

@section('title', 'Detalle del anuncio')

@section('content')
<div class="page-title">
  <div class="title_left">
    <h3>Detalle del anuncio</h3>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
  <div class="col-md-8 col-sm-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>{{ $ad->title }}</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <dl class="row">
          <dt class="col-sm-3">Categoría</dt>
          <dd class="col-sm-9">{{ $ad->category->name ?? '-' }}</dd>

          <dt class="col-sm-3">Precio</dt>
          <dd class="col-sm-9">
            @if(!is_null($ad->price))
              {{ number_format($ad->price, 2) }}
            @else
              -
            @endif
          </dd>

          <dt class="col-sm-3">Ciudad</dt>
          <dd class="col-sm-9">{{ $ad->city ?? '-' }}</dd>

          <dt class="col-sm-3">Teléfono</dt>
          <dd class="col-sm-9">{{ $ad->contact_phone ?? '-' }}</dd>

          <dt class="col-sm-3">Estado</dt>
          <dd class="col-sm-9">
            <span class="badge {{ $ad->status === 'activo' ? 'bg-success' : 'bg-secondary' }}">
              {{ $ad->status ?? '-' }}
            </span>
          </dd>

          <dt class="col-sm-3">Descripción</dt>
          <dd class="col-sm-9">
            {!! nl2br(e($ad->description ?? '')) ?: '-' !!}
          </dd>

          <dt class="col-sm-3">Creado</dt>
          <dd class="col-sm-9">{{ $ad->created_at?->format('Y-m-d H:i') }}</dd>
        </dl>

        <div class="d-flex gap-2">
          <a href="{{ route('ads.index') }}" class="btn btn-secondary">Volver</a>
          <a href="{{ route('ads.edit', $ad) }}" class="btn btn-warning">Editar</a>

          <form action="{{ route('ads.destroy', $ad) }}" method="POST" class="d-inline"
                onsubmit="return confirm('¿Eliminar este anuncio?');">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Eliminar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

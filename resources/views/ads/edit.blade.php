@extends('layouts.app')

@section('title','Editar anuncio')
@section('page_title','Editar anuncio')

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Editar anuncio #{{ $ad->id }}</h2>
        <div class="clearfix"></div>
      </div>

      <div class="x_content">
        {{-- Errores de validación --}}
        @if($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ route('ads.update', $ad) }}" method="POST" class="form-horizontal form-label-left">
          @csrf
          @method('PUT')

          <div class="form-group">
            <label class="control-label col-md-2" for="category_id">Categoría *</label>
            <div class="col-md-6">
              <select name="category_id" id="category_id" class="form-control" required>
                <option value="">-- Seleccione --</option>
                @foreach($categories as $cat)
                  <option value="{{ $cat->id }}" {{ (old('category_id',$ad->category_id)==$cat->id)?'selected':'' }}>
                    {{ $cat->name }}
                  </option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-2" for="title">Título *</label>
            <div class="col-md-6">
              <input type="text" id="title" name="title" class="form-control"
                     value="{{ old('title',$ad->title) }}" maxlength="150" required>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-2" for="description">Descripción</label>
            <div class="col-md-6">
              <textarea id="description" name="description" class="form-control" rows="4">{{ old('description',$ad->description) }}</textarea>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-2" for="price">Precio</label>
            <div class="col-md-3">
              <input type="number" step="0.01" id="price" name="price" class="form-control"
                     value="{{ old('price',$ad->price) }}">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-2" for="city">Ciudad</label>
            <div class="col-md-4">
              <input type="text" id="city" name="city" class="form-control"
                     value="{{ old('city',$ad->city) }}" maxlength="100">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-2" for="contact_phone">Teléfono</label>
            <div class="col-md-4">
              <input type="text" id="contact_phone" name="contact_phone" class="form-control"
                     value="{{ old('contact_phone',$ad->contact_phone) }}" maxlength="30">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-2" for="status">Estado *</label>
            <div class="col-md-3">
              <select id="status" name="status" class="form-control" required>
                @php $st = old('status',$ad->status ?? 'activo'); @endphp
                <option value="activo"   {{ $st==='activo'?'selected':'' }}>Activo</option>
                <option value="inactivo" {{ $st==='inactivo'?'selected':'' }}>Inactivo</option>
              </select>
            </div>
          </div>

          <div class="ln_solid"></div>

          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
              <a href="{{ route('ads.index') }}" class="btn btn-default">Cancelar</a>
              <button type="submit" class="btn btn-success">Guardar cambios</button>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection

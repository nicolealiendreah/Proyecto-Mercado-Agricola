@csrf
<div class="form-group">
  <label>Nombre *</label>
  <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $organico->nombre ?? '') }}" required>
</div>
<div class="form-group">
  <label>Categoría *</label>
  <input type="text" name="categoria" class="form-control" value="{{ old('categoria', $organico->categoria ?? '') }}" required>
</div>
<div class="form-group">
  <label>Precio *</label>
  <input type="number" step="0.01" name="precio" class="form-control" value="{{ old('precio', $organico->precio ?? 0) }}" required>
</div>
<div class="form-group">
  <label>Stock *</label>
  <input type="number" name="stock" class="form-control" value="{{ old('stock', $organico->stock ?? 0) }}" required>
</div>
<div class="form-group">
  <label>Fecha de cosecha</label>
  <input type="date" name="fecha_cosecha" class="form-control" value="{{ old('fecha_cosecha', $organico->fecha_cosecha ?? '') }}">
</div>
<div class="form-group">
  <label>Descripción</label>
  <textarea name="descripcion" class="form-control" rows="3">{{ old('descripcion', $organico->descripcion ?? '') }}</textarea>
</div>
<button class="btn btn-success">Guardar</button>
<a href="{{ route('organicos.index') }}" class="btn btn-secondary">Volver</a>

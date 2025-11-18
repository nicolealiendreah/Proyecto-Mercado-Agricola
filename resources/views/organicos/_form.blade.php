@csrf

<div class="form-group">
  <label>Nombre</label>
  <input type="text" name="nombre" class="form-control"
         value="{{ old('nombre', $organico->nombre ?? '') }}" required>
</div>

<div class="form-group">
  <label>Unidad</label>
  <select name="unidad_id" class="form-control" required>
    <option value="">Seleccione</option>
    @foreach($unidades as $unidad)
      <option value="{{ $unidad->id }}"
        {{ old('unidad_id', $organico->unidad_id ?? '') == $unidad->id ? 'selected' : '' }}>
        {{ $unidad->nombre }}
      </option>
    @endforeach
  </select>
</div>

<div class="form-group">
  <label>Estado</label>
  <select name="estado_id" class="form-control" required>
    <option value="">Seleccione</option>
    @foreach($estados as $estado)
      <option value="{{ $estado->id }}"
        {{ old('estado_id', $organico->estado_id ?? '') == $estado->id ? 'selected' : '' }}>
        {{ $estado->nombre }}
      </option>
    @endforeach
  </select>
</div>

<div class="form-group">
  <label>Precio</label>
  <input type="number" step="0.01" min="0" name="precio" class="form-control"
         value="{{ old('precio', $organico->precio ?? 0) }}" required>
</div>

<div class="form-group">
  <label>Stock</label>
  <input type="number" min="0" name="stock" class="form-control"
         value="{{ old('stock', $organico->stock ?? 0) }}" required>
</div>

<div class="form-group">
  <label>Fecha de cosecha</label>
  <input type="date" name="fecha_cosecha" class="form-control"
         value="{{ old('fecha_cosecha', $organico->fecha_cosecha ?? '') }}">
</div>

<div class="form-group">
  <label>Descripción</label>
  <textarea name="descripcion" class="form-control" rows="3">{{ old('descripcion', $organico->descripcion ?? '') }}</textarea>
</div>

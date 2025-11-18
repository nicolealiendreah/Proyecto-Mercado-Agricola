@csrf

<div class="form-group">
  <label>Nombre</label>
  <input type="text" name="nombre" class="form-control"
         value="{{ old('nombre', $animal->nombre ?? '') }}" required>
</div>

<div class="form-group">
  <label>Especie</label>
  <select name="especie_id" class="form-control" required>
    <option value="">Seleccione</option>
    @foreach($especies as $especie)
      <option value="{{ $especie->id }}"
        {{ old('especie_id', $animal->especie_id ?? '') == $especie->id ? 'selected' : '' }}>
        {{ $especie->nombre }}
      </option>
    @endforeach
  </select>
</div>

<div class="form-group">
  <label>Raza</label>
  <select name="raza_id" class="form-control">
    <option value="">(Opcional)</option>
    @foreach($razas as $raza)
      <option value="{{ $raza->id }}"
        {{ old('raza_id', $animal->raza_id ?? '') == $raza->id ? 'selected' : '' }}>
        {{ $raza->nombre }}
      </option>
    @endforeach
  </select>
</div>

<div class="form-group">
  <label>Unidad</label>
  <select name="unidad_id" class="form-control" required>
    <option value="">Seleccione</option>
    @foreach($unidades as $unidad)
      <option value="{{ $unidad->id }}"
        {{ old('unidad_id', $animal->unidad_id ?? '') == $unidad->id ? 'selected' : '' }}>
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
        {{ old('estado_id', $animal->estado_id ?? '') == $estado->id ? 'selected' : '' }}>
        {{ $estado->nombre }}
      </option>
    @endforeach
  </select>
</div>

<div class="form-group">
  <label>Precio</label>
  <input type="number" step="0.01" min="0" name="precio" class="form-control"
         value="{{ old('precio', $animal->precio ?? 0) }}" required>
</div>

<div class="form-group">
  <label>Stock</label>
  <input type="number" min="0" name="stock" class="form-control"
         value="{{ old('stock', $animal->stock ?? 0) }}" required>
</div>

<div class="form-group">
  <label>Fecha nacimiento</label>
  <input type="date" name="fecha_nacimiento" class="form-control"
         value="{{ old('fecha_nacimiento', isset($animal->fecha_nacimiento) ? $animal->fecha_nacimiento->format('Y-m-d') : '') }}">
</div>

<div class="form-group">
  <label>Descripción</label>
  <textarea name="descripcion" class="form-control" rows="3">{{ old('descripcion', $animal->descripcion ?? '') }}</textarea>
</div>

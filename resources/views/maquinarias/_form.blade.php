@csrf

<div class="form-group">
  <label>Nombre</label>
  <input type="text" name="nombre" class="form-control"
         value="{{ old('nombre', $maquinaria->nombre ?? '') }}" required>
</div>

<div class="form-group">
  <label>Marca</label>
  <input type="text" name="marca" class="form-control"
         value="{{ old('marca', $maquinaria->marca ?? '') }}" required>
</div>

<div class="form-group">
  <label>Modelo</label>
  <input type="text" name="modelo" class="form-control"
         value="{{ old('modelo', $maquinaria->modelo ?? '') }}">
</div>

<div class="form-group">
  <label>Tipo de maquinaria</label>
  <select name="tipo_maquinaria_id" class="form-control" required>
    <option value="">Seleccione</option>
    @foreach($tipos as $tipo)
      <option value="{{ $tipo->id }}"
        {{ old('tipo_maquinaria_id', $maquinaria->tipo_maquinaria_id ?? '') == $tipo->id ? 'selected' : '' }}>
        {{ $tipo->nombre }}
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
        {{ old('estado_id', $maquinaria->estado_id ?? '') == $estado->id ? 'selected' : '' }}>
        {{ $estado->nombre }}
      </option>
    @endforeach
  </select>
</div>

<div class="form-group">
  <label>Precio por día</label>
  <input type="number" step="0.01" min="0" name="precio_dia" class="form-control"
         value="{{ old('precio_dia', $maquinaria->precio_dia ?? 0) }}" required>
</div>

<div class="form-group">
  <label>Descripción</label>
  <textarea name="descripcion" class="form-control" rows="3">{{ old('descripcion', $maquinaria->descripcion ?? '') }}</textarea>
</div>

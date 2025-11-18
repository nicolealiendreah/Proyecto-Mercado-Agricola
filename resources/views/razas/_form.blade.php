@csrf

<div class="form-group">
  <label>Nombre</label>
  <input
    type="text"
    name="nombre"
    class="form-control"
    value="{{ old('nombre', $raza->nombre ?? '') }}"
    required
  >
</div>

<div class="form-group">
  <label>Especie</label>
  <select name="especie_id" class="form-control" required>
    <option value="">Seleccione una especie</option>
    @foreach($especies as $especie)
      <option value="{{ $especie->id }}"
        {{ old('especie_id', $raza->especie_id ?? '') == $especie->id ? 'selected' : '' }}>
        {{ $especie->nombre }}
      </option>
    @endforeach
  </select>
</div>

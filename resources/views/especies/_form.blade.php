@csrf

<div class="form-group">
  <label>Nombre</label>
  <input
    type="text"
    name="nombre"
    class="form-control"
    value="{{ old('nombre', $especie->nombre ?? '') }}"
    required
  >
</div>

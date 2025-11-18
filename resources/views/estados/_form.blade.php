@csrf

<div class="form-group">
  <label>Nombre del Estado</label>
  <input
    type="text"
    name="nombre"
    class="form-control"
    value="{{ old('nombre', $estado->nombre ?? '') }}"
    required
  >
</div>

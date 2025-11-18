@csrf

<div class="form-group">
  <label>Nombre del Tipo de Maquinaria</label>
  <input
    type="text"
    name="nombre"
    class="form-control"
    value="{{ old('nombre', $tipo->nombre ?? '') }}"
    required
  >
</div>

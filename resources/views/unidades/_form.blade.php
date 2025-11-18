@csrf

<div class="form-group">
  <label>Nombre</label>
  <input type="text"
         name="nombre"
         class="form-control"
         value="{{ old('nombre', $unidad->nombre ?? '') }}"
         required>
</div>

<div class="form-group">
  <label>Símbolo (opcional)</label>
  <input type="text"
         name="simbolo"
         class="form-control"
         value="{{ old('simbolo', $unidad->simbolo ?? '') }}"
         placeholder="kg, lt, g, ml, etc.">
</div>

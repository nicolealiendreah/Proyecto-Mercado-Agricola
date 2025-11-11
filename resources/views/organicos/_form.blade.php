@csrf
<div class="form-group">
  <label>Nombre *</label>
  <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $organico->nombre ?? '') }}" required>
</div>

<div class="form-group">
  <label>Categoría *</label>
  <select name="categoria_id" id="categoria_id" class="form-control" required>
    <option value="">Seleccione…</option>
    @foreach($categorias as $c)
      <option value="{{ $c->id }}" @selected(old('categoria_id', $organico->categoria_id ?? '') == $c->id)>{{ $c->nombre }}</option>
    @endforeach
  </select>
</div>

<div class="form-group">
  <label>Variedad *</label>
  <select name="variedad_id" id="variedad_id" class="form-control" required>
    <option value="">Seleccione…</option>
    @foreach(($variedades ?? []) as $v)
      <option value="{{ $v->id }}" @selected(old('variedad_id', $organico->variedad_id ?? '') == $v->id)>{{ $v->nombre }}</option>
    @endforeach
  </select>
</div>

<div class="form-group">
  <label>Unidad *</label>
  <select name="unidad_id" class="form-control" required>
    <option value="">Seleccione…</option>
    @foreach($unidades as $u)
      <option value="{{ $u->id }}" @selected(old('unidad_id', $organico->unidad_id ?? '') == $u->id)>{{ $u->nombre }}</option>
    @endforeach
  </select>
</div>

<div class="form-group">
  <label>Estado *</label>
  <select name="estado_id" class="form-control" required>
    <option value="">Seleccione…</option>
    @foreach($estados as $e)
      <option value="{{ $e->id }}" @selected(old('estado_id', $organico->estado_id ?? '') == $e->id)>{{ $e->nombre }}</option>
    @endforeach
  </select>
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

<script>
async function fillSelect(id, url, params){
  const s = document.getElementById(id);
  s.innerHTML = '<option value="">Cargando…</option>';
  const q = new URLSearchParams(params).toString();
  const res = await fetch(`${url}?${q}`);
  const data = await res.json();
  s.innerHTML = '<option value="">Seleccione…</option>';
  data.forEach(x=>{
    const o = document.createElement('option');
    o.value = x.id; o.textContent = x.nombre;
    s.appendChild(o);
  });
}

const categoria = document.getElementById('categoria_id');
const variedad  = document.getElementById('variedad_id');

categoria?.addEventListener('change', async e=>{
  const id = e.target.value;
  if(!id){ variedad.innerHTML = '<option value="">Seleccione…</option>'; return; }
  await fillSelect('variedad_id','{{ route('api.params') }}',{grupo:'var_organico', parent_id:id});
});
</script>

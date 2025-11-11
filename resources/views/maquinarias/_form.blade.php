@csrf
<div class="form-group">
  <label>Nombre *</label>
  <input name="nombre" class="form-control" value="{{ old('nombre', $maquinaria->nombre ?? '') }}" required>
</div>

<div class="form-group">
  <label>Tipo *</label>
  <select name="tipo_id" id="tipo_id" class="form-control" required>
    <option value="">Seleccione…</option>
    @foreach($tipos as $t)
      <option value="{{ $t->id }}" @selected(old('tipo_id', $maquinaria->tipo_id ?? '') == $t->id)>{{ $t->nombre }}</option>
    @endforeach
  </select>
</div>

<div class="form-group">
  <label>Marca *</label>
  <select name="marca_id" id="marca_id" class="form-control" required>
    <option value="">Seleccione…</option>
    @foreach(($marcas ?? []) as $m)
      <option value="{{ $m->id }}" @selected(old('marca_id', $maquinaria->marca_id ?? '') == $m->id)>{{ $m->nombre }}</option>
    @endforeach
  </select>
</div>

<div class="form-group">
  <label>Modelo</label>
  <select name="modelo_id" id="modelo_id" class="form-control">
    <option value="">Seleccione…</option>
    @foreach(($modelos ?? []) as $mo)
      <option value="{{ $mo->id }}" @selected(old('modelo_id', $maquinaria->modelo_id ?? '') == $mo->id)>{{ $mo->nombre }}</option>
    @endforeach
  </select>
</div>

<div class="form-group">
  <label>Precio por día *</label>
  <input type="number" step="0.01" name="precio_dia" class="form-control" value="{{ old('precio_dia', $maquinaria->precio_dia ?? 0) }}" required>
</div>

<div class="form-group">
  <label>Estado *</label>
  <select name="estado_id" class="form-control" required>
    <option value="">Seleccione…</option>
    @foreach($estados as $e)
      <option value="{{ $e->id }}" @selected(old('estado_id', $maquinaria->estado_id ?? '') == $e->id)>{{ $e->nombre }}</option>
    @endforeach
  </select>
</div>

<div class="form-group">
  <label>Descripción</label>
  <textarea name="descripcion" class="form-control" rows="3">{{ old('descripcion', $maquinaria->descripcion ?? '') }}</textarea>
</div>

<button class="btn btn-success">Guardar</button>
<a href="{{ route('maquinarias.index') }}" class="btn btn-secondary">Volver</a>

<script>
async function fillSelect(id, url, params){
  const s = document.getElementById(id);
  s.innerHTML = '<option value="">Cargando…</option>';
  const q = new URLSearchParams(params).toString();
  const res = await fetch(`${url}?${q}`);
  const data = await res.json();
  s.innerHTML = '<option value="">Seleccione…</option>';
  data.forEach(x=>{
    const o=document.createElement('option'); o.value=x.id; o.textContent=x.nombre; s.appendChild(o);
  });
}

const tipo = document.getElementById('tipo_id');
const marca = document.getElementById('marca_id');
const modelo = document.getElementById('modelo_id');

tipo?.addEventListener('change', async e=>{
  const id = e.target.value;
  modelo.innerHTML = '<option value="">Seleccione…</option>';
  if(!id){ marca.innerHTML = '<option value="">Seleccione…</option>'; return; }
  await fillSelect('marca_id','{{ route('api.params') }}',{grupo:'marca_maquinaria', parent_id:id});
});

marca?.addEventListener('change', async e=>{
  const id = e.target.value;
  if(!id){ modelo.innerHTML = '<option value="">Seleccione…</option>'; return; }
  await fillSelect('modelo_id','{{ route('api.params') }}',{grupo:'modelo_maquinaria', parent_id:id});
});
</script>

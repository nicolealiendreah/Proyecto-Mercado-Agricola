<?php echo csrf_field(); ?>
<div class="form-group">
  <label>Nombre *</label>
  <input type="text" name="nombre" class="form-control" value="<?php echo e(old('nombre', $organico->nombre ?? '')); ?>" required>
</div>

<div class="form-group">
  <label>Categoría *</label>
  <select name="categoria_id" id="categoria_id" class="form-control" required>
    <option value="">Seleccione…</option>
    <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($c->id); ?>" <?php if(old('categoria_id', $organico->categoria_id ?? '') == $c->id): echo 'selected'; endif; ?>><?php echo e($c->nombre); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
</div>

<div class="form-group">
  <label>Variedad *</label>
  <select name="variedad_id" id="variedad_id" class="form-control" required>
    <option value="">Seleccione…</option>
    <?php $__currentLoopData = ($variedades ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($v->id); ?>" <?php if(old('variedad_id', $organico->variedad_id ?? '') == $v->id): echo 'selected'; endif; ?>><?php echo e($v->nombre); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
</div>

<div class="form-group">
  <label>Unidad *</label>
  <select name="unidad_id" class="form-control" required>
    <option value="">Seleccione…</option>
    <?php $__currentLoopData = $unidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($u->id); ?>" <?php if(old('unidad_id', $organico->unidad_id ?? '') == $u->id): echo 'selected'; endif; ?>><?php echo e($u->nombre); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
</div>

<div class="form-group">
  <label>Estado *</label>
  <select name="estado_id" class="form-control" required>
    <option value="">Seleccione…</option>
    <?php $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($e->id); ?>" <?php if(old('estado_id', $organico->estado_id ?? '') == $e->id): echo 'selected'; endif; ?>><?php echo e($e->nombre); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
</div>

<div class="form-group">
  <label>Precio *</label>
  <input type="number" step="0.01" name="precio" class="form-control" value="<?php echo e(old('precio', $organico->precio ?? 0)); ?>" required>
</div>

<div class="form-group">
  <label>Stock *</label>
  <input type="number" name="stock" class="form-control" value="<?php echo e(old('stock', $organico->stock ?? 0)); ?>" required>
</div>

<div class="form-group">
  <label>Fecha de cosecha</label>
  <input type="date" name="fecha_cosecha" class="form-control" value="<?php echo e(old('fecha_cosecha', $organico->fecha_cosecha ?? '')); ?>">
</div>

<div class="form-group">
  <label>Descripción</label>
  <textarea name="descripcion" class="form-control" rows="3"><?php echo e(old('descripcion', $organico->descripcion ?? '')); ?></textarea>
</div>

<button class="btn btn-success">Guardar</button>
<a href="<?php echo e(route('organicos.index')); ?>" class="btn btn-secondary">Volver</a>

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
  await fillSelect('variedad_id','<?php echo e(route('api.params')); ?>',{grupo:'var_organico', parent_id:id});
});
</script>
<?php /**PATH C:\Users\Nicole\mercado-agricola\resources\views/organicos/_form.blade.php ENDPATH**/ ?>
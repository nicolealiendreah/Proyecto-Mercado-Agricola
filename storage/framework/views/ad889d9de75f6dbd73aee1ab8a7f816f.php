<?php echo csrf_field(); ?>
<div class="form-group"><label>Nombre *</label>
  <input name="nombre" class="form-control" value="<?php echo e(old('nombre', $maquinaria->nombre ?? '')); ?>" required>
</div>
<div class="form-group"><label>Tipo *</label>
  <input name="tipo" class="form-control" value="<?php echo e(old('tipo', $maquinaria->tipo ?? '')); ?>" required>
</div>
<div class="form-group"><label>Marca *</label>
  <input name="marca" class="form-control" value="<?php echo e(old('marca', $maquinaria->marca ?? '')); ?>" required>
</div>
<div class="form-group"><label>Modelo</label>
  <input name="modelo" class="form-control" value="<?php echo e(old('modelo', $maquinaria->modelo ?? '')); ?>">
</div>
<div class="form-group"><label>Precio por día *</label>
  <input type="number" step="0.01" name="precio_dia" class="form-control" value="<?php echo e(old('precio_dia', $maquinaria->precio_dia ?? 0)); ?>" required>
</div>
<div class="form-group"><label>Estado *</label>
  <select name="estado" class="form-control" required>
    <?php $__currentLoopData = ['disponible','en_mantenimiento','dado_baja']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($e); ?>" <?php if(old('estado', $maquinaria->estado ?? '')==$e): echo 'selected'; endif; ?>><?php echo e($e); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
</div>
<div class="form-group"><label>Descripción</label>
  <textarea name="descripcion" class="form-control" rows="3"><?php echo e(old('descripcion', $maquinaria->descripcion ?? '')); ?></textarea>
</div>
<button class="btn btn-success">Guardar</button>
<a href="<?php echo e(route('maquinarias.index')); ?>" class="btn btn-secondary">Volver</a>
<?php /**PATH C:\Users\Nicole\mercado-agricola\resources\views/maquinarias/_form.blade.php ENDPATH**/ ?>
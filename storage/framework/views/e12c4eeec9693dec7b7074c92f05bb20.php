<?php echo csrf_field(); ?>

<div class="form-group">
  <label>Nombre</label>
  <input type="text" name="nombre" class="form-control"
         value="<?php echo e(old('nombre', $organico->nombre ?? '')); ?>" required>
</div>

<div class="form-group">
  <label>Unidad</label>
  <select name="unidad_id" class="form-control" required>
    <option value="">Seleccione</option>
    <?php $__currentLoopData = $unidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($unidad->id); ?>"
        <?php echo e(old('unidad_id', $organico->unidad_id ?? '') == $unidad->id ? 'selected' : ''); ?>>
        <?php echo e($unidad->nombre); ?>

      </option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
</div>

<div class="form-group">
  <label>Estado</label>
  <select name="estado_id" class="form-control" required>
    <option value="">Seleccione</option>
    <?php $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($estado->id); ?>"
        <?php echo e(old('estado_id', $organico->estado_id ?? '') == $estado->id ? 'selected' : ''); ?>>
        <?php echo e($estado->nombre); ?>

      </option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
</div>

<div class="form-group">
  <label>Precio</label>
  <input type="number" step="0.01" min="0" name="precio" class="form-control"
         value="<?php echo e(old('precio', $organico->precio ?? 0)); ?>" required>
</div>

<div class="form-group">
  <label>Stock</label>
  <input type="number" min="0" name="stock" class="form-control"
         value="<?php echo e(old('stock', $organico->stock ?? 0)); ?>" required>
</div>

<div class="form-group">
  <label>Fecha de cosecha</label>
  <input type="date" name="fecha_cosecha" class="form-control"
         value="<?php echo e(old('fecha_cosecha', $organico->fecha_cosecha ?? '')); ?>">
</div>

<div class="form-group">
  <label>Descripción</label>
  <textarea name="descripcion" class="form-control" rows="3"><?php echo e(old('descripcion', $organico->descripcion ?? '')); ?></textarea>
</div>
<?php /**PATH C:\Users\Nicole\mercado-agricola\resources\views/organicos/_form.blade.php ENDPATH**/ ?>
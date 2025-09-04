<?php echo csrf_field(); ?>
<div class="form-group">
  <label>Nombre *</label>
  <input type="text" name="nombre" class="form-control" value="<?php echo e(old('nombre', $organico->nombre ?? '')); ?>" required>
</div>
<div class="form-group">
  <label>Categoría *</label>
  <input type="text" name="categoria" class="form-control" value="<?php echo e(old('categoria', $organico->categoria ?? '')); ?>" required>
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
<?php /**PATH C:\Users\Nicole\mercado-agricola\resources\views/organicos/_form.blade.php ENDPATH**/ ?>
<?php echo csrf_field(); ?>

<div class="form-group">
  <label>Nombre</label>
  <input
    type="text"
    name="nombre"
    class="form-control"
    value="<?php echo e(old('nombre', $raza->nombre ?? '')); ?>"
    required
  >
</div>

<div class="form-group">
  <label>Especie</label>
  <select name="especie_id" class="form-control" required>
    <option value="">Seleccione una especie</option>
    <?php $__currentLoopData = $especies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $especie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($especie->id); ?>"
        <?php echo e(old('especie_id', $raza->especie_id ?? '') == $especie->id ? 'selected' : ''); ?>>
        <?php echo e($especie->nombre); ?>

      </option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
</div>
<?php /**PATH C:\Users\Nicole\mercado-agricola\resources\views/razas/_form.blade.php ENDPATH**/ ?>
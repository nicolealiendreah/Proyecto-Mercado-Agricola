<?php echo csrf_field(); ?>

<div class="form-group">
  <label>Nombre</label>
  <input type="text" name="nombre" class="form-control"
         value="<?php echo e(old('nombre', $maquinaria->nombre ?? '')); ?>" required>
</div>

<div class="form-group">
  <label>Marca</label>
  <input type="text" name="marca" class="form-control"
         value="<?php echo e(old('marca', $maquinaria->marca ?? '')); ?>" required>
</div>

<div class="form-group">
  <label>Modelo</label>
  <input type="text" name="modelo" class="form-control"
         value="<?php echo e(old('modelo', $maquinaria->modelo ?? '')); ?>">
</div>

<div class="form-group">
  <label>Tipo de maquinaria</label>
  <select name="tipo_maquinaria_id" class="form-control" required>
    <option value="">Seleccione</option>
    <?php $__currentLoopData = $tipos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($tipo->id); ?>"
        <?php echo e(old('tipo_maquinaria_id', $maquinaria->tipo_maquinaria_id ?? '') == $tipo->id ? 'selected' : ''); ?>>
        <?php echo e($tipo->nombre); ?>

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
        <?php echo e(old('estado_id', $maquinaria->estado_id ?? '') == $estado->id ? 'selected' : ''); ?>>
        <?php echo e($estado->nombre); ?>

      </option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
</div>

<div class="form-group">
  <label>Precio por día</label>
  <input type="number" step="0.01" min="0" name="precio_dia" class="form-control"
         value="<?php echo e(old('precio_dia', $maquinaria->precio_dia ?? 0)); ?>" required>
</div>

<div class="form-group">
  <label>Descripción</label>
  <textarea name="descripcion" class="form-control" rows="3"><?php echo e(old('descripcion', $maquinaria->descripcion ?? '')); ?></textarea>
</div>
<?php /**PATH C:\Users\Nicole\mercado-agricola\resources\views/maquinarias/_form.blade.php ENDPATH**/ ?>
<?php echo csrf_field(); ?>

<div class="form-group">
  <label>Nombre del Estado</label>
  <input
    type="text"
    name="nombre"
    class="form-control"
    value="<?php echo e(old('nombre', $estado->nombre ?? '')); ?>"
    required
  >
</div>
<?php /**PATH C:\Users\Nicole\mercado-agricola\resources\views/estados/_form.blade.php ENDPATH**/ ?>
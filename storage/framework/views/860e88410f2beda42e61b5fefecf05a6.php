<?php echo csrf_field(); ?>

<div class="form-group">
  <label>Nombre</label>
  <input
    type="text"
    name="nombre"
    class="form-control"
    value="<?php echo e(old('nombre', $especie->nombre ?? '')); ?>"
    required
  >
</div>
<?php /**PATH C:\Users\Nicole\mercado-agricola\resources\views/especies/_form.blade.php ENDPATH**/ ?>
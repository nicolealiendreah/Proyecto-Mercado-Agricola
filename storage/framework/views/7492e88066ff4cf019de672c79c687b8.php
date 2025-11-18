<?php echo csrf_field(); ?>

<div class="form-group">
  <label>Nombre del Tipo de Maquinaria</label>
  <input
    type="text"
    name="nombre"
    class="form-control"
    value="<?php echo e(old('nombre', $tipo->nombre ?? '')); ?>"
    required
  >
</div>
<?php /**PATH C:\Users\Nicole\mercado-agricola\resources\views/tipos_maquinaria/_form.blade.php ENDPATH**/ ?>
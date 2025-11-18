<?php echo csrf_field(); ?>

<div class="form-group">
  <label>Nombre</label>
  <input type="text"
         name="nombre"
         class="form-control"
         value="<?php echo e(old('nombre', $unidad->nombre ?? '')); ?>"
         required>
</div>

<div class="form-group">
  <label>Símbolo (opcional)</label>
  <input type="text"
         name="simbolo"
         class="form-control"
         value="<?php echo e(old('simbolo', $unidad->simbolo ?? '')); ?>"
         placeholder="kg, lt, g, ml, etc.">
</div>
<?php /**PATH C:\Users\Nicole\mercado-agricola\resources\views/unidades/_form.blade.php ENDPATH**/ ?>
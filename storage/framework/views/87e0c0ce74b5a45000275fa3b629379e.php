

<?php $__env->startSection('title','Nueva especie'); ?>
<?php $__env->startSection('page_title','Nueva especie'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-body">
    <form action="<?php echo e(route('especies.store')); ?>" method="POST">
      <?php echo $__env->make('especies._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

      <button class="btn btn-primary">Guardar</button>
      <a href="<?php echo e(route('especies.index')); ?>" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlte', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Nicole\mercado-agricola\resources\views/especies/create.blade.php ENDPATH**/ ?>
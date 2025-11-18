

<?php $__env->startSection('title','Nuevo Estado'); ?>
<?php $__env->startSection('page_title','Nuevo Estado'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-body">

    <form action="<?php echo e(route('estados-producto.store')); ?>" method="POST">
      <?php echo $__env->make('estados._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

      <button class="btn btn-primary">Guardar</button>
      <a href="<?php echo e(route('estados-producto.index')); ?>" class="btn btn-secondary">Cancelar</a>
    </form>

  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlte', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Nicole\mercado-agricola\resources\views/estados/create.blade.php ENDPATH**/ ?>
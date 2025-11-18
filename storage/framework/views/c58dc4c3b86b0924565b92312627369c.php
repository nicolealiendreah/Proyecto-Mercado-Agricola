

<?php $__env->startSection('title','Editar Organico'); ?>
<?php $__env->startSection('page_title','Editar Organico'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-body">
    <form action="<?php echo e(route('organicos.update', $organico)); ?>" method="POST">
      <?php echo method_field('PUT'); ?>
      <?php echo $__env->make('organicos._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
      <button class="btn btn-primary">Actualizar</button>
      <a href="<?php echo e(route('organicos.index')); ?>" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlte', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Nicole\mercado-agricola\resources\views/organicos/edit.blade.php ENDPATH**/ ?>
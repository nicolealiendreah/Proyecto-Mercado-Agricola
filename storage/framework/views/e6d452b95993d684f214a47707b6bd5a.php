

<?php $__env->startSection('title','Editar Maquinaria'); ?>
<?php $__env->startSection('page_title','Editar Maquinaria'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-body">
    <form action="<?php echo e(route('maquinarias.update', $maquinaria)); ?>" method="POST">
      <?php echo csrf_field(); ?>
      <?php echo method_field('PUT'); ?>

      <?php echo $__env->make('maquinarias._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

      <button class="btn btn-primary">Actualizar</button>
      <a href="<?php echo e(route('maquinarias.index')); ?>" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlte', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Nicole\mercado-agricola\resources\views/maquinarias/edit.blade.php ENDPATH**/ ?>
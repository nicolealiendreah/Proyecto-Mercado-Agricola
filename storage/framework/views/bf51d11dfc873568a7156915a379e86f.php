

<?php $__env->startSection('title','Nuevo Tipo de Maquinaria'); ?>
<?php $__env->startSection('page_title','Nuevo Tipo de Maquinaria'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-body">

    <form action="<?php echo e(route('tipos-maquinaria.store')); ?>" method="POST">
      <?php echo $__env->make('tipos_maquinaria._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

      <button class="btn btn-primary">Guardar</button>
      <a href="<?php echo e(route('tipos-maquinaria.index')); ?>" class="btn btn-secondary">Cancelar</a>
    </form>

  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlte', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Nicole\mercado-agricola\resources\views/tipos_maquinaria/create.blade.php ENDPATH**/ ?>
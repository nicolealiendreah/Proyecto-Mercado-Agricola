
<?php $__env->startSection('content'); ?>
<div class="x_panel">
  <div class="x_title"><h2>Maquinarias</h2></div>
  <div class="x_content">
    <?php if(session('ok')): ?> <div class="alert alert-success"><?php echo e(session('ok')); ?></div> <?php endif; ?>

    <div class="d-flex mb-2">
      <form method="get" class="form-inline">
        <input type="text" name="q" value="<?php echo e($q); ?>" class="form-control" placeholder="Buscar...">
        <button class="btn btn-primary ml-2">Buscar</button>
      </form>
      <a href="<?php echo e(route('maquinarias.create')); ?>" class="btn btn-success ml-3">Nueva</a>
      <a href="<?php echo e(route('organicos.index')); ?>" class="btn btn-info ml-3">Ir a Orgánicos</a>
    </div>

    <table class="table table-striped">
      <thead><tr>
        <th>#</th><th>Nombre</th><th>Tipo</th><th>Marca</th><th>Precio/día</th><th>Estado</th><th></th>
      </tr></thead>
      <tbody>
      <?php $__empty_1 = true; $__currentLoopData = $maquinarias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
          <td><?php echo e($m->id); ?></td>
          <td><a href="<?php echo e(route('maquinarias.show',$m)); ?>"><?php echo e($m->nombre); ?></a></td>
          <td><?php echo e($m->tipo); ?></td>
          <td><?php echo e($m->marca); ?></td>
          <td><?php echo e(number_format($m->precio_dia,2)); ?></td>
          <td><?php echo e($m->estado); ?></td>
          <td class="text-right">
            <a href="<?php echo e(route('maquinarias.edit',$m)); ?>" class="btn btn-sm btn-primary">Editar</a>
            <form action="<?php echo e(route('maquinarias.destroy',$m)); ?>" method="post" class="d-inline">
              <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
              <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')">Eliminar</button>
            </form>
          </td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr><td colspan="7">Sin registros</td></tr>
      <?php endif; ?>
      </tbody>
    </table>

    <?php echo e($maquinarias->links()); ?>

  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.gentelella', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Nicole\mercado-agricola\resources\views/maquinarias/index.blade.php ENDPATH**/ ?>
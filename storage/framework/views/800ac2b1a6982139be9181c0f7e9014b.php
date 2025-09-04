
<?php $__env->startSection('content'); ?>
<div class="x_panel">
  <div class="x_title"><h2>Orgánicos</h2></div>
  <div class="x_content">
    <?php if(session('ok')): ?> <div class="alert alert-success"><?php echo e(session('ok')); ?></div> <?php endif; ?>

    <div class="d-flex mb-2">
      <form method="get" class="form-inline">
        <input type="text" name="q" value="<?php echo e($q); ?>" class="form-control" placeholder="Buscar...">
        <button class="btn btn-primary ml-2">Buscar</button>
      </form>
      <a href="<?php echo e(route('organicos.create')); ?>" class="btn btn-success ml-3">Nuevo</a>
      <a href="<?php echo e(route('maquinarias.index')); ?>" class="btn btn-info ml-3">Ir a Maquinarias</a>
    </div>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th><th>Nombre</th><th>Categoría</th><th>Precio</th><th>Stock</th><th></th>
        </tr>
      </thead>
      <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $organicos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
          <td><?php echo e($o->id); ?></td>
          <td><a href="<?php echo e(route('organicos.show',$o)); ?>"><?php echo e($o->nombre); ?></a></td>
          <td><?php echo e($o->categoria); ?></td>
          <td><?php echo e(number_format($o->precio,2)); ?></td>
          <td><?php echo e($o->stock); ?></td>
          <td class="text-right">
            <a href="<?php echo e(route('organicos.edit',$o)); ?>" class="btn btn-sm btn-primary">Editar</a>
            <form action="<?php echo e(route('organicos.destroy',$o)); ?>" method="post" class="d-inline">
              <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
              <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')">Eliminar</button>
            </form>
          </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr><td colspan="6">Sin registros</td></tr>
        <?php endif; ?>
      </tbody>
    </table>

    <?php echo e($organicos->links()); ?>

  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.gentelella', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Nicole\mercado-agricola\resources\views/organicos/index.blade.php ENDPATH**/ ?>
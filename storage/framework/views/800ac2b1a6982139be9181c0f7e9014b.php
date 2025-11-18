

<?php $__env->startSection('title', 'Orgánicos'); ?>
<?php $__env->startSection('page_title', 'Orgánicos'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-header d-flex align-items-center">
    <h3 class="card-title mb-0 mr-auto">Listado</h3>

    <form method="get" class="form-inline">
      <div class="input-group input-group-sm mr-2">
        <input type="text" name="q" value="<?php echo e($q ?? ''); ?>" class="form-control" placeholder="Buscar...">
        <div class="input-group-append">
          <button class="btn btn-primary">Buscar</button>
        </div>
      </div>
    </form>

    <a href="<?php echo e(route('organicos.create')); ?>" class="btn btn-success btn-sm">Nuevo</a>
  </div>

  <div class="card-body p-0">
    <table class="table table-striped mb-0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Unidad</th>
          <th>Estado</th>
          <th>Precio</th>
          <th>Stock</th>
          <th>Fecha cosecha</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $organicos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $org): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
            <td><?php echo e($org->id); ?></td>
            <td><?php echo e($org->nombre); ?></td>
            <td><?php echo e($org->unidad?->nombre); ?></td>
            <td><?php echo e($org->estado?->nombre); ?></td>
            <td><?php echo e($org->precio); ?></td>
            <td><?php echo e($org->stock); ?></td>
            <td><?php echo e($org->fecha_cosecha); ?></td>
            <td class="text-nowrap">
              <a href="<?php echo e(route('organicos.edit', $org)); ?>" class="btn btn-sm btn-primary">Editar</a>
              <form action="<?php echo e(route('organicos.destroy', $org)); ?>" method="POST" class="d-inline">
                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')">Eliminar</button>
              </form>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr><td colspan="8" class="text-center">No hay registros</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <div class="card-footer">
    <?php echo e($organicos->links()); ?>

  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlte', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Nicole\mercado-agricola\resources\views/organicos/index.blade.php ENDPATH**/ ?>


<?php $__env->startSection('title','Razas'); ?>
<?php $__env->startSection('page_title','Razas'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-header d-flex align-items-center">
    <h3 class="card-title mb-0 mr-auto">Listado de Razas</h3>

    <a href="<?php echo e(route('razas.create')); ?>" class="btn btn-success btn-sm">
      Nueva raza
    </a>
  </div>

  <div class="card-body p-0">
    <table class="table table-striped mb-0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Especie</th>
          <th class="text-right">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $razas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $raza): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
            <td><?php echo e($raza->id); ?></td>
            <td><?php echo e($raza->nombre); ?></td>
            <td><?php echo e($raza->especie?->nombre); ?></td>
            <td class="text-right text-nowrap">
              <a href="<?php echo e(route('razas.show', $raza)); ?>" class="btn btn-sm btn-info">
                Ver
              </a>

              <a href="<?php echo e(route('razas.edit', $raza)); ?>" class="btn btn-sm btn-primary">
                Editar
              </a>

              <form action="<?php echo e(route('razas.destroy', $raza)); ?>"
                    method="POST"
                    class="d-inline">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button class="btn btn-sm btn-danger"
                        onclick="return confirm('¿Eliminar esta raza?')">
                  Eliminar
                </button>
              </form>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr>
            <td colspan="4" class="text-center">No hay razas registradas</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <div class="card-footer">
    <?php echo e($razas->links()); ?>

  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlte', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Nicole\mercado-agricola\resources\views/razas/index.blade.php ENDPATH**/ ?>
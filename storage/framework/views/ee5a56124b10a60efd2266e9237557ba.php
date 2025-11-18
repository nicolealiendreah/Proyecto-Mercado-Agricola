

<?php $__env->startSection('title','Unidades'); ?>
<?php $__env->startSection('page_title','Unidades'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">

  <div class="card-header d-flex align-items-center">
    <h3 class="card-title mb-0 mr-auto">Listado de Unidades</h3>

    <a href="<?php echo e(route('unidades.create')); ?>" class="btn btn-success btn-sm">
      Nueva Unidad
    </a>
  </div>

  <div class="card-body p-0">
    <table class="table table-striped mb-0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Símbolo</th>
          <th class="text-right">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $unidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
            <td><?php echo e($unidad->id); ?></td>
            <td><?php echo e($unidad->nombre); ?></td>
            <td><?php echo e($unidad->simbolo ?? '-'); ?></td>
            <td class="text-right text-nowrap">
              <a href="<?php echo e(route('unidades.show', $unidad)); ?>" class="btn btn-sm btn-info">
                Ver
              </a>
              <a href="<?php echo e(route('unidades.edit', $unidad)); ?>" class="btn btn-sm btn-primary">
                Editar
              </a>

              <form action="<?php echo e(route('unidades.destroy', $unidad)); ?>"
                    method="POST"
                    class="d-inline">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button class="btn btn-sm btn-danger"
                        onclick="return confirm('¿Eliminar esta unidad?')">
                  Eliminar
                </button>
              </form>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr>
            <td colspan="4" class="text-center">No hay unidades registradas</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <div class="card-footer">
    <?php echo e($unidades->links()); ?>

  </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlte', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Nicole\mercado-agricola\resources\views/unidades/index.blade.php ENDPATH**/ ?>
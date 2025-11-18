

<?php $__env->startSection('title','Especies'); ?>
<?php $__env->startSection('page_title','Especies'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-header d-flex align-items-center">
    <h3 class="card-title mb-0 mr-auto">Listado de Especies</h3>

    <a href="<?php echo e(route('especies.create')); ?>" class="btn btn-success btn-sm">
      Nueva especie
    </a>
  </div>

  <div class="card-body p-0">
    <table class="table table-striped mb-0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th class="text-right">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $especies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $especie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
            <td><?php echo e($especie->id); ?></td>
            <td><?php echo e($especie->nombre); ?></td>
            <td class="text-right text-nowrap">
              <a href="<?php echo e(route('especies.edit', $especie)); ?>" class="btn btn-sm btn-primary">
                Editar
              </a>

              <form action="<?php echo e(route('especies.destroy', $especie)); ?>"
                    method="POST"
                    class="d-inline">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button class="btn btn-sm btn-danger"
                        onclick="return confirm('¿Eliminar esta especie?')">
                  Eliminar
                </button>
              </form>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr>
            <td colspan="3" class="text-center">No hay especies registradas</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <div class="card-footer">
    <?php echo e($especies->links()); ?>

  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlte', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Nicole\mercado-agricola\resources\views/especies/index.blade.php ENDPATH**/ ?>
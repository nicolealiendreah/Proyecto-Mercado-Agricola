

<?php $__env->startSection('title','Maquinarias'); ?>
<?php $__env->startSection('page_title','Maquinarias'); ?>

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

    <a href="<?php echo e(route('maquinarias.create')); ?>" class="btn btn-success btn-sm">Nueva</a>
  </div>

  <div class="card-body p-0">
    <table class="table table-striped mb-0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Marca</th>
          <th>Modelo</th>
          <th>Tipo</th>
          <th>Estado</th>
          <th>Precio/día</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $maquinarias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $maq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
            <td><?php echo e($maq->id); ?></td>
            <td><?php echo e($maq->nombre); ?></td>
            <td><?php echo e($maq->marca); ?></td>
            <td><?php echo e($maq->modelo); ?></td>
            <td><?php echo e($maq->tipoMaquinaria?->nombre); ?></td>
            <td><?php echo e($maq->estado?->nombre); ?></td>
            <td><?php echo e($maq->precio_dia); ?></td>

            <td class="text-nowrap">
              <a href="<?php echo e(route('maquinarias.edit', $maq)); ?>" class="btn btn-sm btn-primary">Editar</a>

              <form action="<?php echo e(route('maquinarias.destroy', $maq)); ?>"
                    method="POST" class="d-inline">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button class="btn btn-sm btn-danger"
                        onclick="return confirm('¿Eliminar esta maquinaria?')">
                  Eliminar
                </button>
              </form>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr>
            <td colspan="8" class="text-center">No hay registros</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <div class="card-footer">
    <?php echo e($maquinarias->links()); ?>

  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlte', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Nicole\mercado-agricola\resources\views/maquinarias/index.blade.php ENDPATH**/ ?>
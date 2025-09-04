<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title><?php echo $__env->yieldContent('title','Mercado Agrícola'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo e(asset('gentelella/vendors/bootstrap/dist/css/bootstrap.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('gentelella/vendors/font-awesome/css/font-awesome.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('gentelella/vendors/nprogress/nprogress.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('gentelella/build/css/custom.min.css')); ?>">
</head>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border:0;">
            <a href="<?php echo e(url('/')); ?>" class="site_title"><i class="fa fa-leaf"></i> <span>Mercado Agrícola</span></a>
          </div>
          <br/>
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>Menú</h3>
              <ul class="nav side-menu">
                <li><a href="<?php echo e(route('organicos.index',[],false)); ?>"><i class="fa fa-pagelines"></i> Orgánicos</a></li>
                <li><a href="<?php echo e(route('maquinarias.index',[],false)); ?>"><i class="fa fa-tractor"></i> Maquinaria</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="top_nav"><div class="nav_menu"><nav>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?php echo e(url('/')); ?>">Inicio</a></li>
        </ul>
      </nav></div></div>

      <div class="right_col" role="main">
        <?php echo $__env->yieldContent('content'); ?>
      </div>

      <footer><div class="pull-right">Laravel + PostgreSQL + Gentelella</div><div class="clearfix"></div></footer>
    </div>
  </div>

  <script src="<?php echo e(asset('gentelella/vendors/jquery/dist/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('gentelella/vendors/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
  <script src="<?php echo e(asset('gentelella/vendors/fastclick/lib/fastclick.js')); ?>"></script>
  <script src="<?php echo e(asset('gentelella/vendors/nprogress/nprogress.js')); ?>"></script>
  <script src="<?php echo e(asset('gentelella/build/js/custom.min.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\Users\Nicole\mercado-agricola\resources\views/layouts/gentelella.blade.php ENDPATH**/ ?>
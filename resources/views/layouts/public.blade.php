<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','AgroVida')</title>

  <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">

  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body class="hold-transition layout-top-nav {{ request()->routeIs('login.demo','register.demo') ? 'no-topbar' : '' }}">
<div class="wrapper">

  @if (!request()->routeIs('login.demo','register.demo'))
  <nav class="main-header navbar navbar-expand navbar-white navbar-light border-0 project-topbar">
    <div class="container">
      <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">
        <img src="{{ asset('img/logo-agrovida.png') }}" alt="AgroVida" style="height:34px">
        <span class="brand-text font-weight-bold ml-2 text-white">AgroVida Bolivia</span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#topnav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div id="topnav" class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link text-white {{ request()->routeIs('home')?'active':'' }}" href="{{ route('home') }}">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('ads.index') }}">Anuncios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-success text-white px-3 ml-lg-2" href="{{ route('ads.create') }}">
              Publicita tu Anuncio <i class="fas fa-plus ml-1"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  @endif


  <div class="content-wrapper bg-white">
    @yield('content')
  </div>

  <footer class="main-footer text-sm">
    <div class="container">
      <strong>© {{ date('Y') }} AgroVida.</strong> Tu mercado agrícola.
      <span class="float-right d-none d-sm-inline">Hecho con AdminLTE 3</span>
    </div>
  </footer>
</div>

<script src="{{ asset('vendor/adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
</body>
</html>

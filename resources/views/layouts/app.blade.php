<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>@yield('title','Panel')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  {{-- Vendors vía CDN (compatibles con Gentelella) --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/nprogress@0.2.0/nprogress.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/icheck/skins/flat/green.css">

  {{-- Estilos mínimos para layout tipo Gentelella (sidebar + topnav) --}}
  <style>
    body.nav-md .container.body .left_col { background:#2A3F54; min-height:100vh; color:#ECF0F1; }
    .nav_title { height:56px; line-height:56px; padding-left:15px; background:#2A3F54; }
    .site_title { color:#ECF0F1; font-weight:600; display:inline-block; }
    .left_col .nav.side-menu > li > a { color:#ECF0F1; }
    .left_col .nav.side-menu > li > a:hover { background:#1ABB9C; color:#fff; }
    .top_nav { margin-left:230px; background:#EDEDED; border-bottom:1px solid #d9dee4; }
    #menu_toggle { padding:15px; display:inline-block; }
    .right_col { margin-left:230px; padding:20px; }
    .x_panel { background:#fff; border:1px solid #E6E9ED; padding:15px; border-radius:4px; }
    .x_title h2 { margin:0 0 10px; }
    footer { margin-left:230px; padding:10px 20px; background:#fff; border-top:1px solid #E6E9ED; }
    .navbar-right { margin-right:10px; }
    @media (max-width: 991px) {
      .right_col, .top_nav, footer { margin-left:0; }
    }
  </style>
  @stack('styles')
</head>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">

      {{-- Sidebar --}}
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border:0;">
            <a href="{{ route('dashboard') }}" class="site_title">
              <i class="fa fa-paw"></i> <span>MercaApp</span>
            </a>
          </div>
          <div class="clearfix"></div>
          <br/>
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>Navegación</h3>
              <ul class="nav side-menu">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
                <li><a href="{{ route('categories.index') }}"><i class="fa fa-tags"></i> Categorías</a></li>
                <li><a href="{{ route('ads.index') }}"><i class="fa fa-bullhorn"></i> Anuncios</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      {{-- Top nav --}}
      <div class="top_nav">
        <div class="nav_menu">
          <nav role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-user"></i> {{ Auth::user()->name ?? 'Invitado' }}
                  <span class="fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                      @csrf
                      <button class="btn btn-link" type="submit">
                        <i class="fa fa-sign-out"></i> Salir
                      </button>
                    </form>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>

      {{-- Contenido --}}
      <div class="right_col" role="main">
        <div class="page-title">
          <div class="title_left">
            <h3>@yield('page_title','Panel')</h3>
          </div>
        </div>
        <div class="clearfix"></div>

        @if(session('ok'))
          <div class="alert alert-success">{{ session('ok') }}</div>
        @endif

        @yield('content')
      </div>

      {{-- Footer --}}
      <footer>
        <div class="pull-right">
          MercaApp - estilo Gentelella (CDN)
        </div>
        <div class="clearfix"></div>
      </footer>
    </div>
  </div>

  {{-- JS via CDN --}}
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/fastclick/lib/fastclick.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/nprogress@0.2.0/nprogress.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/icheck/icheck.min.js"></script>

  <script>
    // Toggle simple (simula el efecto de Gentelella)
    document.getElementById('menu_toggle')?.addEventListener('click', function(){
      document.body.classList.toggle('nav-sm');
      var left = document.querySelector('.left_col');
      if (left) left.style.display = (left.style.display==='none' ? '' : 'none');
    });
  </script>
  @stack('scripts')
</body>
</html>

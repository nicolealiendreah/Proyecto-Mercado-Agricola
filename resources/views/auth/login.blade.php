@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
  <div class="col-12 col-sm-10 col-md-6 col-lg-4">
    <div class="card shadow-sm">
      <div class="card-body">
        <h1 class="h4 mb-3 text-center">Iniciar sesión</h1>
        <p class="text-muted small text-center mb-4">
          Ingresa tus datos para acceder al panel.
        </p>

        <form method="POST" action="{{ route('login.post') }}" novalidate>
          @csrf

          <div class="mb-3">
            <label class="form-label" for="email">Correo</label>
            <input
              id="email"
              name="email"
              type="email"
              class="form-control @error('email') is-invalid @enderror"
              value="{{ old('email') }}"
              autocomplete="email"
              autofocus
              required
              aria-describedby="emailHelp"
            >
            <div id="emailHelp" class="form-text">Ej.: admin@merca.test</div>
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="mb-3">
            <label class="form-label" for="password">Contraseña</label>
            <input
              id="password"
              name="password"
              type="password"
              class="form-control @error('password') is-invalid @enderror"
              required
              autocomplete="current-password"
            >
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">Recordarme</label>
          </div>

          <button class="btn btn-primary w-100">Entrar</button>
        </form>
      </div>
    </div>

    <p class="text-center text-muted small mt-3">
      Usa <strong>admin@merca.test</strong> / <strong>Admin123!</strong>
    </p>
  </div>
</div>
@endsection

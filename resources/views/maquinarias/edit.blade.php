@extends('layouts.adminlte')
@section('content')
<div class="x_panel">
  <div class="x_title"><h2>Editar Maquinaria</h2></div>
  <div class="x_content">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
      </div>
    @endif

    <form action="{{ route('maquinarias.update', $maquinaria) }}" method="post">
      @method('PUT')
      @include('maquinarias._form', [
        'maquinaria' => $maquinaria,
        'tipos'      => $tipos,
        'estados'    => $estados,
        'marcas'     => $marcas,    {{-- ya filtradas por tipo --}}
        'modelos'    => $modelos    {{-- ya filtrados por marca --}}
      ])
    </form>
  </div>
</div>
@endsection

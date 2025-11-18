<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganicoController;
use App\Http\Controllers\MaquinariaController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\EspecieController;
use App\Http\Controllers\RazaController;
use App\Http\Controllers\UnidadController;
use App\Http\Controllers\EstadoProductoController;
use App\Http\Controllers\TipoMaquinariaController;

Route::redirect('/', '/login');
Route::view('/login', 'public.auth.login')->name('login.demo');
Route::view('/registro', 'public.auth.register')->name('register.demo');
Route::view('/inicio', 'public.home')->name('home');

Route::view('/anuncios', 'public.ads.index')->name('ads.index');
Route::view('/publicar', 'public.ads.create')->name('ads.create');

Route::resource('organicos', OrganicoController::class);
Route::resource('maquinarias', MaquinariaController::class);
Route::resource('animales', AnimalController::class);

Route::resource('especies', EspecieController::class);
Route::resource('razas', RazaController::class);
Route::resource('unidades', UnidadController::class)
    ->parameters([
        'unidades' => 'unidad', 
    ]);

Route::resource('estados-producto', EstadoProductoController::class)
    ->parameters([
        'estados-producto' => 'estado',
    ]);
Route::resource('tipos-maquinaria', TipoMaquinariaController::class);

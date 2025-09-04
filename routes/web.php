<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganicoController;
use App\Http\Controllers\MaquinariaController;

Route::redirect('/', '/organicos');

Route::resource('organicos', OrganicoController::class)->names('organicos');
Route::resource('maquinarias', MaquinariaController::class)->names('maquinarias');


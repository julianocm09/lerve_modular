<?php

use Illuminate\Support\Facades\Route;
use Modules\Idicador_partos\Controllers\Idicador_partosController;

Route::get('/idicador_partos', [Idicador_partosController::class, 'index'])
    ->name('idicador_partos.index');

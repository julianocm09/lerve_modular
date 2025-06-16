<?php

use Illuminate\Support\Facades\Route;
use Modules\Uzuarios\Controllers\UzuariosController;

Route::get('/uzuarios', [UzuariosController::class, 'index'])
    ->name('uzuarios.index');

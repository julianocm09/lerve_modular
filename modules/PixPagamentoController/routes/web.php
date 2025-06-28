<?php

use Illuminate\Support\Facades\Route;
use Modules\PixPagamentoController\Controllers\PixPagamentoController;

Route::get('/pixpagamentocontroller', [PixPagamentoController::class, 'index'])
    ->name('pixpagamentocontroller.index');

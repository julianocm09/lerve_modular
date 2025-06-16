<?php

use Illuminate\Support\Facades\Route;
use Modules\Julianocm\Controllers\JulianocmController;

Route::get('/julianocm', [JulianocmController::class, 'index'])
    ->name('julianocm.index');

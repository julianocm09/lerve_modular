<?php

use Illuminate\Support\Facades\Route;
use Modules\Saveform\Controllers\SaveformController;

Route::get('/saveform', [SaveformController::class, 'index'])
    ->name('saveform.index');

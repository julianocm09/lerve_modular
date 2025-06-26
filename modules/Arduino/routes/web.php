<?php

use Illuminate\Support\Facades\Route;
use Modules\Arduino\Controllers\ArduinoController;

Route::get('/arduino', [ArduinoController::class, 'index'])
    ->name('arduino.index');
Route::post('/export', [ArduinoController::class, 'export'])->name('export.ino');
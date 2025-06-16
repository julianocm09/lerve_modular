<?php

use Illuminate\Support\Facades\Route;
use Modules\Galeria\Controllers\GaleriaController;

Route::get('/galeria', [GaleriaController::class, 'index'])->name('galeria.index');
Route::get('/galeria/upload', [GaleriaController::class, 'upload'])->name('galeria.upload');
Route::post('/galeria/upload/store', [GaleriaController::class, 'uploadstore'])->name('galeria.store');
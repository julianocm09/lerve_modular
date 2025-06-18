<?php

use Illuminate\Support\Facades\Route;
use Modules\TesteNeurodivergencia\Controllers\TesteNeurodivergenciaController;

Route::middleware(['auth'])->group(function () {

Route::get('/testeneurodivergencia/form', [TesteNeurodivergenciaController::class, 'index'])->name('test.form');
Route::post('/testeneurodivergencia', [TesteNeurodivergenciaController::class, 'submitForm'])->name('test.submit');
Route::post('/teste/pdf', [TesteNeurodivergenciaController::class, 'gerarPDF'])->name('test.pdf');
}); 

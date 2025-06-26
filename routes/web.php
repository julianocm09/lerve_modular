<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserBlockController;
use App\Http\Controllers\PerfilsController;
use App\Http\Controllers\Ponto\PontoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Administracao\VisualisarfuncionarioController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::delete('/usuarios/{id}', [DashboardController::class, 'destroy'])->name('usuarios.destroy');
Route::get('/plano/renovar/{id}', [DashboardController::class, 'renovarPlano'])->name('plano.renovar');
Route::get('/perfil', [PerfilsController::class, 'index'])->name('Perfil');
Route::post('/perfil/atualizar', [PerfilsController::class, 'update_apikey'])->name('Perfil.update');
Route::post('/perfil/atualizar_foto', [PerfilsController::class, 'update_foto'])->name('Perfil.update_photo');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}/update', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}/delete', [UserController::class, 'destroy'])->name('users.destroy');

# ------------------- Bloqueio de usuários
Route::get('/usuarios/{id}/bloquear', [UserBlockController::class, 'block'])->name('usuarios.bloquear');
Route::get('/usuarios/{id}/desbloquear', [UserBlockController::class, 'unblock'])->name('usuarios.desbloquear');
Route::get('/usuarios/{id}/status', [UserBlockController::class, 'status'])->name('usuarios.status');
# ------------------- Bloqueio de usuários
Route::get('/funcionario/{id}/perfil', [VisualisarfuncionarioController::class, 'index'])->name('funcionario.perfil');


Route::post('/posts', [VisualisarfuncionarioController::class, 'store'])->name('posts.store');



Route::get('/ponto', [PontoController::class, 'index'])->name('ponto.index');
Route::post('/ponto', [PontoController::class, 'store'])->name('ponto.store');
Route::get('/frase-aleatoria', function () {
    [$texto, $autor] = explode(' - ', \Illuminate\Foundation\Inspiring::quotes()->random(), 2);
    return response()->json([
        'texto' => trim($texto),
        'autor' => trim($autor)
    ]);
})->name('frase.aleatoria');
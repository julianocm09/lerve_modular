<?php

use Illuminate\Support\Facades\Route;
use Modules\Codeexecutr\Controllers\CodeexecutrController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
Route::get('/codeexecutr', [CodeexecutrController::class, 'index'])
    ->name('codeexecutr.index');


Route::match(['get', 'post'], '/dev/artisan-run', function (Request $request) {
    $output = null;
    $comando = null;

    if ($request->isMethod('post')) {
        $comando = $request->input('comando');

        // Só permitir comandos seguros, evite qualquer coisa perigosa
        $comandosPermitidos = [
            'cache:clear',
            'config:cache',
            'route:list',
            'view:clear',
            'migrate:status',
        ];

        if (in_array($comando, $comandosPermitidos)) {
            Artisan::call($comando);
            $output = Artisan::output();
        } else {
            $output = "Comando não permitido.";
        }
    }

    return view('Codeexecutr::artisan-run', compact('output', 'comando'));
});
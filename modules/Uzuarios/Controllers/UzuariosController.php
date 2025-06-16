<?php

namespace Modules\Uzuarios\Controllers;

use App\Http\Controllers\Controller;
use Modules\Uzuarios\Models\Uzuarios;

class UzuariosController extends Controller
{
    public function index()
    {
        $usuarios = Uzuarios::all();
        return view('Uzuarios::hello', compact('usuarios'));
    }
}

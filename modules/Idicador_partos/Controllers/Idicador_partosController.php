<?php

namespace Modules\Idicador_partos\Controllers;

use App\Http\Controllers\Controller;

class Idicador_partosController extends Controller
{
    public function index()
    {
        return view('Idicador_partos::hello');
    }
}

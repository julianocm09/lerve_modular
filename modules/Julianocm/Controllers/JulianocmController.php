<?php

namespace Modules\Julianocm\Controllers;

use App\Http\Controllers\Controller;

class JulianocmController extends Controller
{
    public function index()
    {
        return view('Julianocm::hello');
    }
}

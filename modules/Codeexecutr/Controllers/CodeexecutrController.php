<?php

namespace Modules\Codeexecutr\Controllers;

use App\Http\Controllers\Controller;

class CodeexecutrController extends Controller
{
    public function index()
    {
        return view('Codeexecutr::hello');
    }
}

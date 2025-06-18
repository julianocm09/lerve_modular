<?php

namespace Modules\Saveform\Controllers;

use App\Http\Controllers\Controller;

class SaveformController extends Controller
{
    public function index()
    {
        return view('Saveform::hello');
    }
}

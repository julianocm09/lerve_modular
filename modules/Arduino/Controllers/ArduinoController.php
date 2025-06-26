<?php

namespace Modules\Arduino\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ArduinoController extends Controller
{
    public function index()
    {
        return view('Arduino::hello');
    }
        public function export(Request $request)
    {
        $code = $request->input('code');
        $filename = 'sketch_' . now()->format('Ymd_His') . '.ino';

        return Response::make($code)
            ->header('Content-Type', 'text/plain')
            ->header('Content-Disposition', "attachment; filename=\"$filename\"");
    }
}

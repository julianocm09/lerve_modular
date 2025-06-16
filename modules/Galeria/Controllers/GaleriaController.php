<?php

namespace Modules\Galeria\Controllers;

use App\Http\Controllers\Controller;
use Modules\Galeria\Models\Galeria;
use Illuminate\Http\Request;

class GaleriaController extends Controller
{
    public function index()
    {
        $imagens = Galeria::all();
        return view('Galeria::hello', compact('imagens'));
    }
    public function upload()
    {
        $imagens = Galeria::all();
        return view('Galeria::upload', compact('imagens'));
    }

   
    public function uploadstore(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'required|image|max:2048',
    ]);

    $file = $request->file('image');
    $base64 = base64_encode(file_get_contents($file));

    Galeria::create([
        'name' => $request->name,
        'description' => $request->description,
        'base64' => $base64,
    ]);

    return back()->with('success', 'Imagem salva com sucesso!');
}


}

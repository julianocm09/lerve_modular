<?php

namespace App\Http\Controllers\Administracao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
 public function store(Request $request)
{
    $request->validate([
        'conteudo' => 'required|string',
        'publico' => 'required|boolean',
        'imagem' => 'nullable|image|max:2048',
        'destinatario_id' => 'nullable|exists:users,id',
    ]);

    $imagemBase64 = null;

    if ($request->hasFile('imagem')) {
        $file = $request->file('imagem');
        $imagemBinaria = file_get_contents($file);
        $mimeType = $file->getClientMimeType(); // tipo MIME (image/png, etc)
        $imagemBase64 = 'data:' . $mimeType . ';base64,' . base64_encode($imagemBinaria);
    }

    $post = new Post();
    $post->user_id = auth()->id();
    $post->conteudo = $request->input('conteudo');
    $post->publico = $request->boolean('publico');
    $post->imagem = $imagemBase64;
    $post->destinatario_id = $request->input('destinatario_id');
    $post->save();

    return redirect()->back()->with('success', 'Post criado com sucesso!');
}

}

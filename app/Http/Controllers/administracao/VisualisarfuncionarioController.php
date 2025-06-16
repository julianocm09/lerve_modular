<?php

namespace App\Http\Controllers\Administracao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class VisualisarfuncionarioController extends Controller
{



public function index()
{
    $userId = auth()->id();

    $usuarios = User::where('id', '!=', $userId)->get();

    $posts = Post::with('user')
        ->where(function ($query) use ($userId) {
            $query->where('publico', 1)
                  ->orWhere(function ($query2) use ($userId) {
                      $query2->where('publico', 0)
                             ->where(function ($query3) use ($userId) {
                                 $query3->where('destinatario_id', $userId)
                                        ->orWhere('user_id', $userId);
                             });
                  });
        })
        ->orderBy('created_at', 'desc')
        ->get();

    return view('administracao.visualisarfuncionario', compact('usuarios', 'posts'));
}



public function store(Request $request)
{
    $request->validate([
        'conteudo' => 'required|string',
        'publico' => 'required|boolean',
        'imagem_base64' => 'nullable|string', // recebida do input hidden
        'destinatario_id' => 'nullable|exists:users,id',
    ]);

    $post = new Post();
    $post->user_id = auth()->id();
    $post->conteudo = $request->input('conteudo');
    $post->publico = $request->boolean('publico');
    $post->imagem = $request->input('imagem_base64'); // já é base64
    $post->destinatario_id = $request->input('destinatario_id');
    $post->save();

    return redirect()->back()->with('success', 'Post criado com sucesso!');
}


}

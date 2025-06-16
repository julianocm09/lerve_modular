<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiKeyController;
use App\Models\Post;
class PerfilsController extends Controller
{
    public function index(Request $request)
    {
        $apiKeyController = new ApiKeyController();
        $apiKey = $apiKeyController->generate(); // ou gere só se necessário


        $posts = Post::with('user')
    ->where('publico', false) // ou ->where('publico', 0)
    ->where('destinatario_id', auth()->id())
    ->orderBy('created_at', 'desc')
    ->get();
        return view('perfil.index', compact('apiKey', 'posts'));
    }
     
public function update_apikey(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'api_key' => 'required|string|max:255',
        
    ]);

    DB::table('users')
        ->where('id', $user->id)
        ->update([
          
            'api_key' => $request->api_key, // apenas se for permitir edição manual//
            'updated_at' => now(), // importante manter isso manualmente
        ]);

    return redirect()->back()->with('success', 'Perfil atualizado com sucesso!');
}
public function update_foto(Request $request)
{
    $user = Auth::user();

     DB::table('users')
        ->where('id', $user->id)
        ->update([
          
            'fotoperfil' => $request->profile_image_base64, // apenas se for permitir edição manual//
            'updated_at' => now(), // importante manter isso manualmente
        ]);

    return redirect()->back()->with('success', 'Perfil atualizado com sucesso!');
}
}

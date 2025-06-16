<?php
namespace App\Http\Controllers;

use App\Models\ApiKey;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApiKeyController extends Controller
{
    public function generate()
    {
        do {
            $key = Str::random(15);
        } while (ApiKey::where('key', $key)->exists());

        // Salva a chave no banco
        ApiKey::create(['key' => $key]);

        // Retorna a chave como resposta JSON
        return response()->json(['key' => $key]);
    }
}
?>
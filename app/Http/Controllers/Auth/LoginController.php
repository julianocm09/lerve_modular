<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // essa view é o login.blade.php que te passei
    }

public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials, $request->filled('remember'))) {
        $request->session()->regenerate();

        // Verificar se o usuário está bloqueado
        if (Auth::user()->is_blocked) {
            Auth::logout(); // Desloga o usuário imediatamente

            $pixUrl = route('pix.gerar');
            $iconUrl = asset('img/icons8-foto-48.svg');
            return back()->withErrors([
                'email' => 'Seu acesso está bloqueado. Entre em contato com o administrador pelo WhatsApp +5549 98900 8769 para mais informações.',
            ])->withInput();
        }

        return redirect()->intended('/dashboard');
    }

    return back()->withErrors([
        'email' => 'As credenciais fornecidas não foram encontradas.',
    ])->withInput();
}


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

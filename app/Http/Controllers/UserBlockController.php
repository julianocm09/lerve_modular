<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\UsuarioBloqueadoMail;
use App\Mail\UsuarioDesbloqueadoMail;

class UserBlockController extends Controller
{
    public function block($id)
    {
        $user = User::findOrFail($id);
        $user->is_blocked = true;
        $user->save();
    // Envia o e-mail de notificação
    //Mail::to($user->email)->send(new UsuarioBloqueadoMail($user));
        return redirect()->route('dashboard')->with('message', 'Usuário bloqueado com sucesso.');
    }

    public function unblock($id)
    {
        $user = User::findOrFail($id);
        $user->is_blocked = false;
        $user->save();


    // Envia o e-mail de notificação
    //Mail::to($user->email)->send(new UsuarioDesbloqueadoMail($user));
        return redirect()->route('dashboard')->with('message', 'Usuário desbloqueado com sucesso.');
    }

    public function status($id)
    {
        $user = User::findOrFail($id);
        return response()->json([
            'id' => $user->id,
            'bloqueado' => $user->is_blocked,
        ]);
    }
}

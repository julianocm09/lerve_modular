@extends('layouts.app')

@section('content')
<style>
.reset-container {
    max-width: 400px;
    margin: 40px auto;
    padding: 32px 24px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 24px rgba(0,0,0,0.08);
}
.reset-title {
    text-align: center;
    font-size: 1.7rem;
    margin-bottom: 24px;
    color: #333;
    font-weight: 600;
}
.reset-form label {
    display: block;
    margin-bottom: 6px;
    color: #555;
    font-weight: 500;
}
.reset-form input[type="password"] {
    width: 100%;
    padding: 10px 12px;
    margin-bottom: 18px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 1rem;
    transition: border 0.2s;
}
.reset-form input[type="password"]:focus {
    border-color: #007bff;
    outline: none;
}
.reset-form button {
    width: 100%;
    padding: 12px;
    background: #007bff;
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.2s;
}
.reset-form button:hover {
    background: #0056b3;
}
.reset-form .back-link {
    display: block;
    text-align: center;
    margin-top: 18px;
    color: #007bff;
    text-decoration: none;
    font-size: 0.97rem;
}
.reset-form .back-link:hover {
    text-decoration: underline;
}
</style>

<div class="reset-container">
    <div class="reset-title">Redefinir Senha</div>
    @if ($errors->any())
        <div style="color: #d9534f; margin-bottom: 16px;">
            <ul style="margin:0; padding-left: 18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="reset-form" method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ $email }}">

        <label for="password">Nova Senha</label>
        <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Digite sua nova senha">

        <label for="password_confirmation">Confirmar Senha</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirme sua nova senha">

        <button type="submit">Alterar Senha</button>
        <a href="{{ route('login') }}" class="back-link">Voltar para o login</a>
    </form>
</div>
@endsection

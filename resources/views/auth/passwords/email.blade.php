<!DOCTYPE html>
<html lang="br" class="body-full-height">
<head>
    <title>Painel Versão 2.9 - Recuperar Senha</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/theme-default.css') }}" />

    <script src="{{ asset('js/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap/bootstrap.min.js') }}"></script>
</head>

<body>
    <div class="login-container">
        <div class="login-box animated fadeInDown">
            <div class="login-logo">Painel {{ config('app.name') }}</div>
            <div class="login-legenda">Gestão de Clientes</div>
            <div class="login-body">
                <div class="login-title"><strong>Recuperar Senha</strong></div>

                @if (session('status'))
                    <div class="alert alert-success" id="flash-message">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger" id="flash-message">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="form-horizontal">
                    @csrf

                    <div class="form-group">
                        <div class="col-md-12">
                            <input id="email" type="email" name="email" class="form-control" placeholder="Digite seu e-mail" required autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-info btn-block">Enviar link de redefinição</button>
                            <a href="{{ route('login') }}" class="btn btn-link btn-block">Voltar para login</a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="login-footer">
                <div class="pull-left">
                    © 2020 Portal. Todos Os Direitos Reservados.
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            setTimeout(function() {
                $('#flash-message').fadeOut('slow');
            }, 10000);
        });
    </script>
</body>
</html>

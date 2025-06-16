{{-- View: uzuarios.edit --}}
@extends('layouts.app')
@section('content')

@include('layouts.barasuperior')


<aside>
    <div id="sidebar" class="nav-collapse " style="overflow: hidden; outline: none;" tabindex="0">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a class="active" href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>{{ ucfirst(str_replace('.', ' > ', 'uzuarios.edit')) }}</span>
                </a>
            </li>

            @include('layouts.menu')


        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>




<section id="main-content">
    <section class="wrapper">
        <!--comeco do formulario-->
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <header class="card-header">
                        Edição de Usuário (Mais Antigo)
                    </header>
                    <div class="card-body">
                        <div class="form">
                            <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="{{ route('users.update', $user->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="form-group row">
                                    <label for="name" class="control-label col-lg-2">Nome</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="name" name="name" type="text" value="{{ $user->name }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="familiname" class="control-label col-lg-2">Sobrenome</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="familiname" name="familiname" type="text" value="{{ $user->familiname }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="control-label col-lg-2">Email</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="email" name="email" type="email" value="{{ $user->email }}">
                                    </div>
                                </div>









                                <div class="form-group row">
                                    <label for="password" class="control-label col-lg-2">Password</label>
                                    <div class="col-lg-10 input-group">
                                        <input class="form-control" id="password" name="password" type="password">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" onclick="togglePassword()">
                                                <i class="fa fa-eye" id="toggleIcon"></i>
                                            </button>
                                        </div>

                                    </div>

                                </div>


                                <div class="form-group row">
                                    <label for="password_confirmation" class="control-label col-lg-2">Confirmar Password</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="Birthday" class="control-label col-lg-2">Data de Nascimento</label>
                                    <div class="col-lg-10">
                                        @php
                                        try {
                                        $birthday = $user->birthday ? \Carbon\Carbon::parse($user->birthday)->format('Y-m-d') : '';
                                        } catch (\Exception $e) {
                                        $birthday = '';
                                        }
                                        @endphp

                                       <input type="text" name="Birthday" value="{{ old('Birthday', \Carbon\Carbon::parse($user->Birthday)->format('d/m/Y')) }}" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="Occupation" class="control-label col-lg-2">Ocupação</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="Occupation" name="Occupation" type="text" value="{{ $user->Occupation }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="Mobile" class="control-label col-lg-2">Celular</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="Mobile" name="Mobile" type="text" value="{{ $user->Mobile }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="Phone" class="control-label col-lg-2">Telefone Fixo</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="Phone" name="Phone" type="text" value="{{ $user->Phone }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="dicadesenha" class="control-label col-lg-2">Dica de Senha</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="dicadesenha" name="dicadesenha" type="text" value="{{ $user->dicadesenha }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="biografia" class="control-label col-lg-2">Biografia</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control" id="biografia" name="biografia">{{ $user->biografia }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="Country" class="control-label col-lg-2">País</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="Country" name="Country" type="text" value="{{ $user->Country }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="Countrycode" class="control-label col-lg-2">Código do País</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="Countrycode" name="Countrycode" type="text" value="{{ $user->Countrycode }}">
                                    </div>
                                </div>

                                <input type="hidden" name="created_by" value="{{ auth()->user()->name }}">

                                <div class="form-group row">
                                    <label for="data_vencimento" class="control-label col-lg-2">Vencimento</label>
                                    <div class="col-lg-10">
                                        @php
                                        try {
                                        $dataVenc = \Carbon\Carbon::parse($user->data_vencimento)->format('Y-m-d');
                                        } catch (\Exception $e) {
                                        $dataVenc = '';
                                        }
                                        @endphp

                                        <input class="form-control" id="data_vencimento" name="data_vencimento" type="date"
                                            value="{{ old('data_vencimento', $dataVenc) }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-danger" type="submit">Salvar</button>
                                        <button class="btn btn-default" type="button" onclick="window.history.back();">Cancelar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <!-- Formulário de Edição de Usuário -->

    </section>
</section>


<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('toggleIcon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        }
    }
</script>


@endsection
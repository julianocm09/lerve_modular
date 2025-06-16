@extends('layouts.app')

@section('content')

<div class="container">

    <form class="form-signin" method="POST" action="{{ route('login') }}">
        <h2 class="form-signin-heading">sign in now</h2>
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="login-wrap">
            <input type="text" class="form-control" name="email" placeholder="User ID" autofocus>
            <input type="password" class="form-control" name="password" placeholder="Password">
            <label class="checkbox">
                <input type="checkbox" name="remember" value="1"> Remember me
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>
                </span>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
        </div>
    </form>

</div>

@endsection

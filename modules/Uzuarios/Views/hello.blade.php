@extends('layouts.app')
@section('content')

@include('layouts.barasuperior')

<aside>
    <div id="sidebar" class="nav-collapse " style="overflow: hidden; outline: none;" tabindex="0">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            @include('layouts.menu')
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>

<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="directory-info-row">
            <div class="row">


                @foreach($usuarios as $usuario)


                <div class="col-md-6 ">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <a class="mr-3" href="#">

                                    <img
                                        class="thumb media-object"
                                        style="background-color:rgb(206, 206, 206)!important;"
                                        src="{{ $usuario->fotoperfil ? $usuario->fotoperfil : asset('img/default-avatar.png') }}"
                                        alt="{{ $usuario->name }}">

                                </a>
                                <div class="media-body">
                                    <h4>{{ $usuario->name }}<span class="text-muted small"> - {{ $usuario->Occupation }}</span></h4>
                                    <ul class="social-links">
                                        <li><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" data-original-title="LinkedIn"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" data-original-title="Skype"><i class="fa fa-skype"></i></a></li>
                                    </ul>
                                    <address>
                                        <strong>{{ $usuario->email }}</strong><br>

                                        <abbr title="Phone">Whatsapp:</abbr> {{ $usuario->Mobile }}
                                    </address>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach


















            </div>
        </div>
        <!--page end-->
    </section>
</section>

@endsection
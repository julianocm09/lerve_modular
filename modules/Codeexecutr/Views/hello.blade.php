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
        <div class="row">
            <h1>View do módulo Codeexecutr</h1>
            <p>Esta é uma view de exemplo para o módulo Codeexecutr.</p>
        </div>
    </section>
</section>

@endsection

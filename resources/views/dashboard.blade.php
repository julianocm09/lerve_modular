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
         
 


@if (Auth::user()->is_admin)
   @include('layouts.indicadores')
    @include('administracao.tabela_usuarios')
    <div class="row">
       
    </div>
@else
    <div>Você é um usuário comum</div>
@endif
          </section>
      </section>




@endsection

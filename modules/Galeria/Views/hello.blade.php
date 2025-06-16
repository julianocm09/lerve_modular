@extends('layouts.app')
@section('content')

@include('layouts.barasuperior')
 <link rel="stylesheet" type="text/css" href="{{ asset('css/gallery.css') }}" />
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
              <section class="card">
                  <header class="card-header">
                      Image Galley
                  </header>
                  <div class="card-body">
                      <ul class="grid cs-style-3">


                      @foreach ($imagens as $imagem)
 

                          <li>
    <figure>
        <img src="data:image/png;base64,{{ $imagem->base64 }}" alt="{{ $imagem->name }}">
        <figcaption>
            <h3>{{ $imagem->name }}</h3>
            <span>{{ $imagem->description }}</span>
            <a class="fancybox" 
               rel="group" 
               href="data:image/png;base64,{{ $imagem->base64 }}" 
               title="<strong>{{ $imagem->name }}</strong><br>{{ $imagem->description }}">
                Take a look
            </a>
        </figcaption>
    </figure>
</li>

                     
                          @endforeach
                         
                      </ul>

                  </div>
              </section>

              <!-- page end-->
          </section>
      </section>

@endsection

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
                            <span>{{ ucfirst(str_replace('.', ' > ', 'administracao.visualisarfuncionario')) }}</span>
                        </a>
                    </li>

                     @include('layouts.menu')
                  

                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>




<section id="main-content">
          <section class="wrapper">
         <section class="wrapper site-min-height">
              <!-- page start-->
              <div class="row">
                  <div class="col-md-9">
                      <section class="card">
                          <div class="cover-photo">
                              <div class="fb-timeline-img">
                                  <img src="{{ asset('img/fb-img.jpg') }}" alt="">
                              </div>
                              <div class="fb-name">
                                  <h2><a href="#">{{ Auth::user()->name}}</a></h2>
                              </div>
                          </div>
                          <div class="card-body">
                              <div class="profile-thumb">
                                  <img src="{{ Auth::user()->fotoperfil ?? asset('img/foto/default.jpg') }}" alt="{{ Auth::user()->name}}">
                              </div>
                              <a href="#" class="fb-user-mail">{{ Auth::user()->email }}</a>
                          </div>
                      </section>
<section class="card profile-info">
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" id="postForm">
        @csrf
        <textarea name="conteudo" class="form-control input-lg p-text-area" rows="2" placeholder="O que você tem em mente hoje?" required></textarea>

        <!-- Campo hidden para guardar o base64 da imagem -->
        <input type="hidden" name="imagem_base64" id="imagem_base64" value="">

        <!-- Campo hidden para destinatário -->
        <input type="hidden" name="destinatario_id" id="destinatario_id" value="">

        <footer class="card-footer d-flex align-items-center justify-content-between flex-wrap">

            <!-- Botão postar -->
            <button type="submit" class="btn btn-danger">Postar</button>

            <!-- Ícones e controle -->
            <div class="d-flex align-items-center">

                <!-- Ícones -->
                <ul class="nav nav-pills mb-0 mr-3">
                   
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('imagem').click();">
                            <i class="fa fa-camera"></i>
                        </a>
                    </li>
                   
                   
                </ul>

                <!-- Miniatura da imagem -->
                <img id="preview" src="#" alt="Prévia" style="display:none; width:64px; height:64px; object-fit:cover; border-radius:4px; margin-right: 15px;">

                <!-- Visibilidade -->
                <div class="form-group mb-0 mr-3 d-flex align-items-center">
                   
                    <label class="mr-2 mb-0">
                        <input type="radio" name="publico" value="1" checked onchange="toggleDestinatario(false)"> Público
                    </label>
                    <label class="mb-0">
                        <input type="radio" name="publico" value="0" onchange="toggleDestinatario(true)"> Privado
                    </label>
                </div>

                <!-- Dropdown destinatário (inicialmente escondido) -->
                <div class="btn-group" id="destinatario-container" style="display:none;">
                    <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Destinatário
                    </button>
                    <div class="dropdown-menu">
                        @foreach($usuarios as $usuario)
                            @if($usuario->id !== auth()->id())
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); selecionarDestinatario({{ $usuario->id }}, '{{ $usuario->name }}')">{{ $usuario->name }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>

            </div>

        </footer>

        <!-- Upload oculto -->
        <input type="file" name="imagem" id="imagem" accept="image/*" style="display:none;" onchange="handleImage(this)">
    </form>
</section>

<script>
    function toggleDestinatario(mostrar) {
        const container = document.getElementById('destinatario-container');
        const destinatarioInput = document.getElementById('destinatario_id');
        if(mostrar) {
            container.style.display = 'inline-block';
        } else {
            container.style.display = 'none';
            destinatarioInput.value = '';
        }
    }

    function selecionarDestinatario(id, nome) {
          const destinatarioInput = document.getElementById('destinatario_id');
    destinatarioInput.value = id;

    // Muda o texto do botão dropdown para o nome do destinatário escolhido
    const btnDropdown = document.querySelector('#destinatario-container > button');
    btnDropdown.textContent = nome;

    // Fecha o dropdown (opcional)
    btnDropdown.setAttribute('aria-expanded', 'false');
    const dropdownMenu = document.querySelector('#destinatario-container .dropdown-menu');
    dropdownMenu.classList.remove('show');
    }

    function handleImage(input) {
        if(input.files && input.files[0]) {
            const file = input.files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                // Coloca o base64 no hidden
                document.getElementById('imagem_base64').value = e.target.result;

                // Mostra a miniatura
                const preview = document.getElementById('preview');
                preview.src = e.target.result;
                preview.style.display = 'inline-block';
            }
            reader.readAsDataURL(file);
        }
    }
</script>

                
                      @include("administracao.posts")

                  </div>
                  <div class="col-md-3">
                      <div class="fb-timeliner">
                          <h2 class="recent-highlight">Recent</h2>
                          <ul>
                              <li class="active"><a href="#">December</a></li>
                              <li><a href="#">November</a></li>
                              <li><a href="#">October</a></li>
                              <li><a href="#">September</a></li>
                              <li><a href="#">August</a></li>
                              <li><a href="#">July</a></li>
                              <li><a href="#">June</a></li>
                              <li><a href="#">May</a></li>
                              <li><a href="#">April</a></li>
                              <li><a href="#">March</a></li>
                              <li><a href="#">February</a></li>
                              <li><a href="#">January</a></li>
                          </ul>
                      </div>
                      <div class="fb-timeliner">
                          <h2>2012</h2>
                          <ul>
                              <li><a href="#">August</a></li>
                              <li><a href="#">July</a></li>
                              <li><a href="#">June</a></li>
                              <li><a href="#">May</a></li>
                              <li><a href="#">April</a></li>
                              <li><a href="#">March</a></li>
                              <li><a href="#">February</a></li>
                              <li><a href="#">January</a></li>
                          </ul>
                      </div>

                      <div class="fb-timeliner">
                          <h2>2011</h2>
                          <ul>
                              <li><a href="#">May</a></li>
                              <li><a href="#">April</a></li>
                              <li><a href="#">March</a></li>
                              <li><a href="#">February</a></li>
                              <li><a href="#">January</a></li>
                          </ul>
                      </div>
                  </div>
              </div>
              <!-- page end-->
          </section>
 
          </section>
      </section>





@endsection

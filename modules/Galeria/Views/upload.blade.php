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
                      Image upload
                  </header>
                  <div class="card-body">
                      <section class="card">
    <header class="card-header">
        Upload de Imagem - Galeria
    </header>
    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('galeria.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Nome da Imagem</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Digite o nome da imagem" required>
            </div>

            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea name="description" id="description" class="form-control" rows="3" placeholder="Digite uma descrição"></textarea>
            </div>

            <div class="form-group">
                <label for="image">Selecionar Imagem</label>
                <div class="dropzone-area" style="border: 2px dashed #ccc; padding: 20px; text-align: center; cursor: pointer;">
                    <input type="file" name="image" id="image" class="form-control-file" accept="image/*" required style="display: none;">
                    <p id="dropzone-text">Clique aqui ou arraste uma imagem</p>
                    <img id="preview" src="#" alt="Prévia da imagem" style="max-width: 300px; display: none; margin-top: 15px; border: 1px solid #ccc; padding: 5px;">
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Enviar</button>
        </form>
    </div>
</section>

<style>
    .dropzone-area:hover {
        background-color: #f9f9f9;
    }
</style>

<script>
    const dropzone = document.querySelector('.dropzone-area');
    const fileInput = document.getElementById('image');
    const preview = document.getElementById('preview');
    const dropzoneText = document.getElementById('dropzone-text');

    // Clique na área ativa o input
    dropzone.addEventListener('click', () => fileInput.click());

    // Quando selecionar a imagem
    fileInput.addEventListener('change', function(event) {
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                dropzoneText.style.display = 'none';
            }

            reader.readAsDataURL(file);
        }
    });

    // Permitir arrastar e soltar
    dropzone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropzone.style.backgroundColor = '#f0f0f0';
    });

    dropzone.addEventListener('dragleave', (e) => {
        e.preventDefault();
        dropzone.style.backgroundColor = '#fff';
    });

    dropzone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropzone.style.backgroundColor = '#fff';
        const file = e.dataTransfer.files[0];

        if (file) {
            fileInput.files = e.dataTransfer.files;
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                dropzoneText.style.display = 'none';
            }

            reader.readAsDataURL(file);
        }
    });
</script>


                  </div>
              </section>

              <!-- page end-->
          </section>
      </section>

@endsection

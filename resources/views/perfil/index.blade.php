
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
                            <span>Dashboard</span>
                        </a>
                    </li>

                     @include('layouts.menu')
                  

                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>




<section id="main-content">
          <section class="wrapper">
            
          
          
          <div class="row">
                  <aside class="profile-nav col-lg-3">
                      <section class="card">
                          <div class="user-heading round">
                              <a href="#">
                                  <img src="{{ Auth::user()->fotoperfil ?? asset('img/foto/default.jpg') }}" alt="">
                              </a>
                              <h1>{{ Auth::user()->name }}&nbsp; {{ Auth::user()->familiname }}</h1>
                              <p>{{ Auth::user()->email }}</p>
                          </div>

                          <ul class="nav nav-pills nav-stacked">
                              <li class="active nav-item"><a class="nav-link" href="profile.html"> <i class="fa fa-user"></i> Profile</a></li>
                              <li class="nav-item"><a class="nav-link" href="profile-activity.html"> <i class="fa fa-calendar"></i> Recent Activity <span class="badge badge-danger pull-right r-activity">9</span></a></li>
                              <li class="nav-item"><a class="nav-link" href="profile-edit.html"> <i class="fa fa-edit"></i> Edit profile</a></li>
                          </ul>

                      </section>
                  </aside>
                  <aside class="profile-info col-lg-9">
                      <section class="card">
                          <form>
                              <textarea placeholder="Whats in your mind today?" rows="2" class="form-control input-lg p-text-area"></textarea>
                          </form>
                          <footer class="card-footer">
                              <button class="btn btn-danger float-right">Post</button>
                              <ul class="nav nav-pills">
                                  <li class="nav-item">
                                      <a class="nav-link" href="#"><i class="fa fa-map-marker"></i></a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" href="#"><i class="fa fa-camera"></i></a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" href="#"><i class=" fa fa-film"></i></a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" href="#"><i class="fa fa-microphone"></i></a>
                                  </li>
                              </ul>
                          </footer>
                      </section>
                      <section class="card">
                          <div class="bio-graph-heading">
                             {{ Auth::user()->biografia ?? 'Nenhuma biografia definida.' }} 
                        </div>
                          <div class="card-body bio-graph-info">
                              <h1>Bio Graph</h1>
                              <div class="row">
                                  <div class="bio-row">
                                      <p><span>Nome </span>: {{ Auth::user()->name }}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Sobrenome </span>: {{ Auth::user()->familiname }}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>País </span>: {{ Auth::user()->Country }}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Data de Nascimento</span>: {{ Auth::user()->Birthday }}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Ocupação </span>: {{ Auth::user()->Occupation }}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Email </span>: {{ Auth::user()->email }}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Whatsapp </span>: {{ phone(auth()->user()->Mobile) }}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Telefone </span>: {{ phone(auth()->user()->Phone) }}</p>
                                  </div>
                              </div>
                          </div>
                      </section>
                      <section>
                          <div class="row">
                              @include('administracao.postprivado')
                          </div>
                      </section>
                  </aside>
              </div>


               </section>
      </section>




@endsection

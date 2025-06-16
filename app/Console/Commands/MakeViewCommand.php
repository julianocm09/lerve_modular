<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeViewCommand extends Command
{
    protected $signature = 'make:view {name}';
    protected $description = 'Cria uma nova view Blade com um esboço padrão';

    public function handle()
    {
        $name = $this->argument('name');
        $path = resource_path('views/' . str_replace('.', '/', $name) . '.blade.php');

        if (File::exists($path)) {
            $this->error('A view já existe!');
            return;
        }

        File::ensureDirectoryExists(dirname($path));

        $stub = <<<HTML
{{-- View: $name --}}
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
                            <span>{{ ucfirst(str_replace('.', ' > ', '$name')) }}</span>
                        </a>
                    </li>

                     @include('layouts.menu')
                  

                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>




<section id="main-content">
          <section class="wrapper">
         
 
          </section>
      </section>




@endsection

HTML;

        File::put($path, $stub);
        $this->info("View [$name] criada em: $path");
    }
}

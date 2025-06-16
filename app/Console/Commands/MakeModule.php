<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeModule extends Command
{
    protected $signature = 'make:module {name}';
    protected $description = 'Cria a estrutura base de um módulo com Controller, Model, View, Rotas e adiciona no menu';

    public function handle()
    {
        $name = ucfirst($this->argument('name'));
        $modulePath = base_path('modules/' . $name);

        if (File::exists($modulePath)) {
            $this->error("O módulo {$name} já existe!");
            return;
        }

        // Criar diretórios
        File::makeDirectory($modulePath . '/Controllers', 0755, true);
        File::makeDirectory($modulePath . '/Models', 0755, true);
        File::makeDirectory($modulePath . '/Views', 0755, true);
        File::makeDirectory($modulePath . '/routes', 0755, true);

        // Arquivo de rota web
        File::put(
            $modulePath . '/routes/web.php',
            "<?php\n\nuse Illuminate\\Support\\Facades\\Route;\nuse Modules\\{$name}\\Controllers\\{$name}Controller;\n\nRoute::get('/" . strtolower($name) . "', [{$name}Controller::class, 'index'])\n    ->name('" . strtolower($name) . ".index');\n"
        );

        // Arquivo de rota API
        File::put(
            $modulePath . '/routes/api.php',
            "<?php\n\nuse Illuminate\\Support\\Facades\\Route;\n\n// Rotas API do módulo {$name}\n"
        );

        // Controller
        $controllerContent = "<?php\n\nnamespace Modules\\{$name}\\Controllers;\n\nuse App\\Http\\Controllers\\Controller;\n\nclass {$name}Controller extends Controller\n{\n    public function index()\n    {\n        return view('{$name}::hello');\n    }\n}\n";
        File::put($modulePath . "/Controllers/{$name}Controller.php", $controllerContent);

        // Model
        $modelContent = "<?php\n\nnamespace Modules\\{$name}\\Models;\n\nuse Illuminate\\Database\\Eloquent\\Model;\n\nclass {$name} extends Model\n{\n    protected \$guarded = [];\n}\n";
        File::put($modulePath . "/Models/{$name}.php", $modelContent);

        // View
        $viewContent = "@extends('layouts.app')
@section('content')

@include('layouts.barasuperior')

<aside>
    <div id=\"sidebar\" class=\"nav-collapse \" style=\"overflow: hidden; outline: none;\" tabindex=\"0\">
        <!-- sidebar menu start-->
        <ul class=\"sidebar-menu\" id=\"nav-accordion\">
            @include('layouts.menu')
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>

<section id=\"main-content\">
    <section class=\"wrapper\">
        <div class=\"row\">
            <h1>View do módulo {$name}</h1>
            <p>Esta é uma view de exemplo para o módulo {$name}.</p>
        </div>
    </section>
</section>

@endsection
";
        File::put($modulePath . "/Views/hello.blade.php", $viewContent);

        // Atualizar menu
        $this->updateMenu($name);

        $this->info("✅ Módulo {$name} criado com sucesso em modules/{$name} e adicionado no menu.");
    }

    /**
     * Atualiza o arquivo de menu automaticamente
     */ protected function updateMenu($name)
    {
        $menuFile = resource_path('views/layouts/menu.blade.php');

        if (!File::exists($menuFile)) {
            $this->error("❌ Arquivo menu.blade.php não encontrado.");
            return;
        }

        $menuContent = File::get($menuFile);

        // Bloco de menu novo
        $newMenuBlock = "\n<li class=\"sub-menu dcjq-parent-li\">
    <a href=\"javascript:;\" class=\"dcjq-parent\">
        <i class=\"fa fa-laptop\"></i>
        <span>" . ucfirst($name) . "</span>
        <span class=\"dcjq-icon\"></span>
    </a>
    <ul class=\"sub\" style=\"display: none;\">
        <li>
            <a href=\"{{ route('" . strtolower($name) . ".index') }}\">
                <i class=\"fa fa-calendar\"></i> " . ucfirst($name) . "
            </a>
        </li>
    </ul>
</li>\n";

        // Verifica se já existe no menu
        if (str_contains($menuContent, "<span>" . ucfirst($name) . "</span>")) {
            $this->info("⚠️ O menu para {$name} já existe.");
            return;
        }

        // Simplesmente adiciona ao final do arquivo
        $menuContent .= "\n" . $newMenuBlock;

        File::put($menuFile, $menuContent);

        $this->info("✅ Menu atualizado com sucesso.");
    }
}

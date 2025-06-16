<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Caminho padrão após login.
     */
    public const HOME = '/home';

    /**
     * Bootstrap de configuração das rotas.
     */
    public function boot()
    {
        // Limites de requisição da API
        $this->configureRateLimiting();

        // Registro de rotas
        $this->routes(function () {
            // 🔥 Rotas API padrão
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // 🔥 Rotas WEB padrão
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // 🔥 Carregar rotas dos módulos
            $this->loadModuleRoutes();
        });
    }

    /**
     * Limitação de requisições API.
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(
                $request->user()?->id ?: $request->ip()
            );
        });
    }

    /**
     * 🔥 Função que carrega rotas dos módulos automaticamente.
     */
    protected function loadModuleRoutes()
    {
        $modulesPath = base_path('modules');

        // Verificar se a pasta modules existe
        if (!is_dir($modulesPath)) {
            return;
        }

        // Percorrer todos os diretórios dentro de modules
        $modules = scandir($modulesPath);

        foreach ($modules as $module) {
            if (in_array($module, ['.', '..'])) {
                continue;
            }

            $routeFile = $modulesPath . '/' . $module . '/routes/web.php';

            if (file_exists($routeFile)) {
                Route::middleware('web')
                    ->group($routeFile);
            }

            // Se quiser também pode adicionar api.php
            $apiRouteFile = $modulesPath . '/' . $module . '/routes/api.php';

            if (file_exists($apiRouteFile)) {
                Route::prefix('api')
                    ->middleware('api')
                    ->group($apiRouteFile);
            }
        }
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class ModuleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $modulesPath = base_path('modules');

        if (!is_dir($modulesPath)) {
            return;
        }

        $modules = scandir($modulesPath);

        foreach ($modules as $module) {
            if (in_array($module, ['.', '..'])) {
                continue;
            }

            // Registrar views
            $viewPath = $modulesPath . '/' . $module . '/Views';
            if (is_dir($viewPath)) {
                $this->loadViewsFrom($viewPath, $module);
            }

            // Registrar rotas web
            $webRoutes = $modulesPath . '/' . $module . '/routes/web.php';
            if (file_exists($webRoutes)) {
                Route::middleware('web')
                    ->group($webRoutes);
            }

            // Registrar rotas api
            $apiRoutes = $modulesPath . '/' . $module . '/routes/api.php';
            if (file_exists($apiRoutes)) {
                Route::prefix('api')
                    ->middleware('api')
                    ->group($apiRoutes);
            }
        }
    }
}

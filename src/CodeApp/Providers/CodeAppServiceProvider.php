<?php

namespace CodePress\CodeApp\Providers;

use Illuminate\Support\ServiceProvider;
use CodePress\CodeApp\Models\AppConfig;
use Illuminate\Support\Facades\Schema;

/**
 * Description of CodeAppServiceProvider
 *
 * @author gabriel
 */
class CodeAppServiceProvider extends ServiceProvider
{

    public function boot()
    {
        Schema::defaultStringLength(191);
        //$this->publishes([__DIR__ . '/../../config/auth.php' => base_path('config/auth.php')], 'config');
        $this->publishes([__DIR__ . '/../../resources/migrations/' => base_path('database/migrations')], 'migrations');

        $this->loadViewsFrom(__DIR__ . '/../../resources/views/codeapp', 'codeapp');
        require __DIR__ . '/../routes.php';
    }

    public function register()
    {
        $this->app->bind(AppConfig::class, function () {
            return AppConfig::find(1);
        });
    }

}

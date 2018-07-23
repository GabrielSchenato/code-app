<?php

namespace CodePress\CodeApp\Providers;

use Illuminate\Support\ServiceProvider;
use CodePress\CodeUser\Repository\UserRepositoryInterface;
use CodePress\CodeUser\Repository\UserRepositoryEloquent;
use CodePress\CodeUser\Repository\RoleRepositoryInterface;
use CodePress\CodeUser\Repository\RoleRepositoryEloquent;
use CodePress\CodeUser\Repository\PermissionRepositoryInterface;
use CodePress\CodeUser\Repository\PermissionRepositoryEloquent;
use CodePress\CodeUser\Routing\Router;
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
        //require __DIR__ . '/../routes.php';
    }

    public function register()
    {
        /*$this->app->bind(UserRepositoryInterface::class, UserRepositoryEloquent::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepositoryEloquent::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepositoryEloquent::class);
        $this->app->singleton('codepress_user_route', function () {
            return new Router();            
        });
        $this->app->register(EventServiceProvider::class);
        $this->app->register(AuthServiceProvider::class);*/
    }

}

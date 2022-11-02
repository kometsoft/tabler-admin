<?php

namespace Tabler\App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/tabler.php',
            'tabler'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . 'routes/web.php');

        $this->loadViewsFrom(__DIR__ . 'resources/views', 'tabler');

        $this->publishes([
            __DIR__ . 'config/tabler.php' => config_path('tabler.php'),
        ], 'tabler-config');

        $this->publishes([
            __DIR__ . 'app/Models/stubs' => app_path('Models'),
        ], 'tabler-models');

        $this->publishes([
            __DIR__ . 'stubs' => base_path('stubs'),
        ], 'tabler-stubs');

        $this->publishes([
            __DIR__ . 'database/migrations' => database_path('migrations')
        ], 'tabler-migrations');

        $this->publishes([
            __DIR__ . 'public/vendor' => public_path('vendor'),
        ], 'tabler-asset');
    }
}

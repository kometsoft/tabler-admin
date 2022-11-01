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
            __DIR__ . '/../config/tabler.php',
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
        $this->loadRoutesFrom(base_path('tabler/routes/web.php'));

        $this->loadViewsFrom(base_path('tabler/resources/views'), 'tabler');

        $this->publishes([
            base_path('tabler/config/tabler.php') => config_path('tabler.php'),
        ], 'tabler-config');

        $this->publishes([
            base_path('tabler/app/Models/stubs') => app_path('Models'),
        ], 'tabler-models');

        $this->publishes([
            base_path('tabler/stubs') => base_path('stubs'),
        ], 'tabler-stubs');

        $this->publishes([
            base_path('tabler/database/migrations') => database_path('migrations')
        ], 'tabler-migrations');

        $this->publishes([
            base_path('tabler/public/vendor') => public_path('vendor'),
        ], 'tabler-asset');
    }
}

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
            base_path('tabler/config/tabler.php'), 'tabler'
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
        ]);

        $this->publishes([
            base_path('tabler/public') => public_path(),
        ], 'tabler-asset');
    }
}

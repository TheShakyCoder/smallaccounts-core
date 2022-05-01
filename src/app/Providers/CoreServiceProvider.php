<?php

namespace Smallaccounts\Core\App\Providers;

use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/smallaccounts.php', 'smallaccounts'
        );
        $this->publishes([
            __DIR__.'/../../config/smallaccounts.php' => config_path('smallaccounts.php'),
        ]);
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../../routes/api.php');
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'smallaccounts');
    }

    public function register()
    {
        
    }
}
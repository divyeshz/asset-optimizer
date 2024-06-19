<?php

namespace AssetOptimizer;

use Illuminate\Support\ServiceProvider;

class AssetOptimizerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/optimizer.php' => config_path('optimizer.php'),
        ]);
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/optimizer.php', 'optimizer'
        );
    }
}

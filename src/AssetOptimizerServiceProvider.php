<?php

namespace AssetOptimizer;

use Illuminate\Support\ServiceProvider;

/**
 * Class AssetOptimizerServiceProvider
 *
 * This service provider is responsible for publishing the configuration file and merging it into the application's configuration.
 */
class AssetOptimizerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * This method publishes the package's configuration file to the application's config directory.
     * This allows the user to customize the configuration settings.
     */
    public function boot()
    {
        // Publish the package configuration file to the application's config directory
        $this->publishes([
            __DIR__ . '/../config/optimizer.php' => config_path('optimizer.php'),
        ]);
    }

    /**
     * Register any application services.
     *
     * This method merges the package's configuration file with the application's existing configuration.
     * This ensures that the package's configuration settings are available within the application.
     */
    public function register()
    {
        // Merge the package configuration file with the application's existing configuration
        $this->mergeConfigFrom(
            __DIR__ . '/../config/optimizer.php',
            'optimizer'
        );
    }
}

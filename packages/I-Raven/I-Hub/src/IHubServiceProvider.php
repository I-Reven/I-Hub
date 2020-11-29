<?php

namespace IRaven\IHub;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\ServiceProvider;
use IRaven\IHub\Application\Services\IHubService;
use IRaven\IHub\Application\Services\PingService;
use IRaven\IHub\Infra\Console\Kernel;
use IRaven\IHub\Infra\Console\PingCommand;

/**
 * Class IHubServiceProvider
 * @package IRaven\IHub
 */
class IHubServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__ . '/Infra/Resources/lang', 'i-raven');
        $this->loadViewsFrom(__DIR__ . '/Infra/Resources/views', 'i-raven');
        $this->loadMigrationsFrom(__DIR__ . '/Infra/Database/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/Infra/Routes/api.php');
        $this->loadRoutesFrom(__DIR__ . '/Infra/Routes/web.php');

        foreach (IHubAutoWireServiceProvider::boot() as $contract => $class) {
            $this->app->bind($contract, $class);
        }

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }

        // Attach Package Console Kernel
        $this->app->booted(function () {
            (new Kernel())->schedule(app(Schedule::class));
        });
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/Domain/Config/i-hub.php', 'i-hub');

        // Register Event Service Provider
        $this->app->register(IHubEventServiceProvider::class);

        // Register the service the package provides.
        $this->app->singleton('i-hub', function ($app) {
            return new IHubService($app->make(PingService::class));
        });

        /** Redirect Exception To Package Handler */
//        $this->app->singleton(ExceptionHandler::class, ExceptionHandlerContract::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['i-hub'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__ . '/Domain/Config/i-hub.php' => config_path('i-hub.php'),
        ], 'i-hub.config');

        // Publishing the views.
        $this->publishes([
            __DIR__ . '/Infra/Resources/views' => base_path('resources/views/vendor/i-raven'),
        ], 'i-hub.views');

        // Publishing assets.
        $this->publishes([
            __DIR__ . '/../resources/assets' => public_path('vendor/i-raven'),
        ], 'i-hub.views');

        // Publishing the translation files.
        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/i-raven'),
        ], 'i-hub.views');

        // Registering package commands.
        $this->commands([
            PingCommand::class
        ]);
    }
}

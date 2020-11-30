<?php

namespace IRaven\Hexagonal;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\ServiceProvider;
use IRaven\Hexagonal\Application\Services\HexagonalService;
use IRaven\Hexagonal\Application\Services\PingService;
use IRaven\Hexagonal\Infra\Console\Kernel;
use IRaven\Hexagonal\Infra\Console\PingCommand;

/**
 * Class HexagonalServiceProvider
 * @package IRaven\Hexagonal
 */
class HexagonalServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__ . '/Infra/Resources/lang', 'hexagonal');
        $this->loadViewsFrom(__DIR__ . '/Infra/Resources/views', 'hexagonal');
        $this->loadMigrationsFrom(__DIR__ . '/Infra/Database/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/Infra/Routes/api.php');
        $this->loadRoutesFrom(__DIR__ . '/Infra/Routes/web.php');

        foreach (HexagonalAutoWireServiceProvider::boot() as $contract => $class) {
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
        $this->mergeConfigFrom(__DIR__ . '/Domain/Config/hexagonal.php', 'hexagonal');

        // Register Event Service Provider
        $this->app->register(HexagonalEventServiceProvider::class);

        // Register the service the package provides.
        $this->app->singleton('hexagonal', function ($app) {
            return new HexagonalService($app->make(PingService::class));
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
        return ['hexagonal'];
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
            __DIR__ . '/Domain/Config/hexagonal.php' => config_path('hexagonal.php'),
        ], 'hexagonal.config');

        // Publishing the views.
        $this->publishes([
            __DIR__ . '/Infra/Resources/views' => base_path('resources/views/vendor/i-raven'),
        ], 'hexagonal.views');

        // Publishing assets.
        $this->publishes([
            __DIR__ . '/../resources/assets' => public_path('vendor/i-raven'),
        ], 'hexagonal.views');

        // Publishing the translation files.
        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/i-raven'),
        ], 'hexagonal.views');

        // Registering package commands.
        $this->commands([
            PingCommand::class
        ]);
    }
}
